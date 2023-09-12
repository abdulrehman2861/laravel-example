<?php

namespace App\Repositories;


use App\Models\Car;
use App\Models\User;
use App\Models\Year;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ProductImage;
use App\Models\Quotation;
use App\Models\SaleTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SaleTransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\CustomerTypeRepositoryInterface;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;

class SaleTransactionRepository implements SaleTransactionRepositoryInterface
{

    private $customerRepository,
        $customerTypeRepository;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        CustomerTypeRepositoryInterface $customerTypeRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->customerTypeRepository = $customerTypeRepository;
    }


    /**
     * alltransactions
     *
     * @return LengthAwarePaginator
     */
    public function alltransactions(): LengthAwarePaginator
    {
        return SaleTransaction::latest()->paginate(10);
    }

    /**
     * allSaleOrdertransaction
     *
     * @param  mixed $search
     * @param  mixed $perpage
     * @param  mixed $sortBy
     * @param  mixed $sortDirection
     * @return LengthAwarePaginator
     */
    public function allSaleOrdertransaction($search = null, $perpage = 10, $sortBy = 'created_at', $sortDirection = 'desc'): LengthAwarePaginator
    {
        return SaleTransaction::where(function ($q) use ($search) {
            $q->whereHas('customer', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
                ->orWhere(DB::raw("CONCAT('SL-', LPAD(id, 3, '0'))"), 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('payment_status', 'LIKE', "%{$search}%");
        })
            ->where('transaction_type', SaleTransaction::TRANSACTION_TYPE_SALE_ORDER)
            ->orderBy($sortBy, $sortDirection)
            ->paginate($perpage);
    }

    /**
     * allWorkOrdertransaction
     *
     * @param  mixed $search
     * @param  mixed $perpage
     * @param  mixed $sortBy
     * @param  mixed $sortDirection
     * @return LengthAwarePaginator
     */
    public function allWorkOrdertransaction($search = null, $perpage = 10, $sortBy = 'created_at', $sortDirection = 'desc'): LengthAwarePaginator
    {
        return SaleTransaction::where(function ($q) use ($search) {
            $q->whereHas('customer', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
                ->orWhere(DB::raw("CONCAT('QT-', LPAD(id, 4, '0'))"), 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('payment_status', 'LIKE', "%{$search}%");
        })
            ->where('transaction_type', SaleTransaction::TRANSACTION_TYPE_WORK_ORDER)
            ->orderBy($sortBy, $sortDirection)
            ->paginate($perpage);
    }

    public function allActiveUserWorkOrdertransaction($search = null, $perpage = 10, $sortBy = 'created_at', $sortDirection = 'desc'): LengthAwarePaginator
    {
        return SaleTransaction::where(function ($q) use ($search) {

            $q->where(DB::raw("CONCAT('QT-', LPAD(id, 4, '0'))"), 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('payment_status', 'LIKE', "%{$search}%");
        })
            ->whereHas('customer', function ($query) use ($search) {
                $query->where('user_id', auth()->user()->id);
            })
            ->where('transaction_type', SaleTransaction::TRANSACTION_TYPE_WORK_ORDER)
            ->orderBy($sortBy, $sortDirection)
            ->paginate($perpage);
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        if (request()->existing_customer != true) {
            $customer = Customer::where('email', $data['customer']['email'])->first();
            if (!$customer) {

                // add user

                $user = User::where('email', $data['customer']['email'])->first();
                if ($user == null) {
                    $user = new User();
                    $user->name =  $data['customer']['name'];
                    $user->email = $data['customer']['email'];
                    $user->type = User::TYPE_CUSTOMER;
                    $user->password = Hash::make('123123');
                    $user->save();
                    $user->refresh();
                }

                $data['customer']['user_id'] = $user->id;

                $customer = $this->customerRepository->store($data['customer']);
                $customer->refresh();
            }
            $data['customer_id'] = $customer->id;
        }

        // upload image if exist
        if (request()->hasFile('glass_issue_image')) {
            $damageImage = request()->file('glass_issue_image')->store('glass_issue_images', 'public');
            $data['glass_issue_image'] = $damageImage;
        }

        
        $saleTransaction = SaleTransaction::create($data);

        foreach ($data['details'] as $detail) {
            $saleTransaction->transactionDetails()->create($detail);
        }

        return  $saleTransaction;
    }



    /**
     * findTransaction
     *
     * @param  mixed $id
     * @return Model
     */
    public function findTransaction($id): Model
    {
        return SaleTransaction::findorFail($id);
    }

    /**
     * update
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return model
     */
    public function update($data, $id): model
    {
        if (request()->existing_customer != true) {

            $customer = Customer::where('email', $data['customer']['email'])->first();
            if (!$customer) {
                $customer = $this->customerRepository->store($data['customer']);
                $customer->refresh();
            }

            $data['customer_id'] = $customer->id;
        }

        $saleTransaction = SaleTransaction::findorFail($id);
        $oldStatus = $saleTransaction->status;
        $saleTransaction->update($data);
        $saleTransaction->refresh();

        $newStatus = $saleTransaction->status;

        //$saleTransaction->transactionDetails()->delete();
        foreach (request()->details as $detail) {
            $transactionDetail = SaleTransactionDetail::find($detail['id'] ?? 0);
            if ($transactionDetail == null) {
                $saleTransaction->transactionDetails()->create($detail);
                $tempProduct = Product::findorFail($detail['product_id']);

                if ($newStatus == SaleTransaction::TRANSACTION_STATUS_COMPLETE && $tempProduct) {
                    $tempProduct->quantity = (int)$tempProduct->quantity - (int)$detail['quantity'];
                    $tempProduct->save();
                }
            } else {
                $tmpOldQty = $transactionDetail->quantity;
                // dump('old',$tmpOldQty);
                $transactionDetail->update($detail);
                $transactionDetail->refresh();
                $tmpNewQty = $transactionDetail->quantity;

                $tempProduct = Product::findorFail($detail['product_id']);

                if ($newStatus != $oldStatus) {
                    if ($newStatus == SaleTransaction::TRANSACTION_STATUS_COMPLETE) {
                        $tempProduct->quantity = (int)$tempProduct->quantity - (int)$detail['quantity'];
                        $tempProduct->save();
                    }

                    if ($oldStatus == SaleTransaction::TRANSACTION_STATUS_COMPLETE) {
                        $tempProduct->quantity = (int)$tempProduct->quantity + (int)$tmpOldQty;
                        $tempProduct->save();
                    }
                }
                elseif ($tmpOldQty != $tmpNewQty && $newStatus == $oldStatus && $oldStatus == SaleTransaction::TRANSACTION_STATUS_COMPLETE)
                {
                    if ((int)$tmpOldQty > (int)$tmpNewQty ) {
                        $tempProduct->quantity = (int)$tempProduct->quantity + ( (int)$tmpOldQty - (int)$tmpNewQty );
                        $tempProduct->save();
                    }else
                    {
                        $tempProduct->quantity = (int)$tempProduct->quantity - ( (int)$tmpNewQty - (int)$tmpOldQty );
                        $tempProduct->save();
                    }
                }

                // dump($tmpOldQty != $tmpNewQty , $newStatus == $oldStatus , $oldStatus == SaleTransaction::TRANSACTION_STATUS_COMPLETE);
                // dump($tmpOldQty , $tmpNewQty ,  $oldStatus , $newStatus, SaleTransaction::TRANSACTION_STATUS_COMPLETE, '=====================================');
            }
        }
// die();

        // if ($newStatus != $oldStatus)
        // {
        //     if ($newStatus == SaleTransaction::TRANSACTION_STATUS_COMPLETE)
        //     {
        //         //minus stock
        //     }

        //     if ($oldStatus == SaleTransaction::TRANSACTION_STATUS_COMPLETE) {
        //         //add stock
        //     }
        // }



        return  $saleTransaction;
    }

    /**
     * getAllQuotation
     *
     * @param  mixed $search
     * @param  mixed $perpage
     * @param  mixed $sortBy
     * @param  mixed $sortDirection
     * @return LengthAwarePaginator
     */
    public function getAllQuotes($search = null, $perpage = 10, $sortBy = 'created_at', $sortDirection = 'desc'): LengthAwarePaginator
    {
        return Quotation::where(function ($q) use ($search) {
            $q->orWhere(DB::raw("status"), 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('year', 'LIKE', "%{$search}%")
                ->orWhere('make', 'LIKE', "%{$search}%")
                ->orWhere('model', 'LIKE', "%{$search}%")
                ->orWhere('body_style', 'LIKE', "%{$search}%")
                ->orWhere('deductible', 'LIKE', "%{$search}%")
                ->orWhere('zip_code', 'LIKE', "%{$search}%");
        })
            ->orderBy($sortBy, $sortDirection)
            ->paginate($perpage);
    }

    /**
     * find Quotation
     */
    public function findQuotation($id)
    {
        return Quotation::findorFail($id);
    }

    /**
     * destroy Quotation
     */
    public function destroyQuotation($id)
    {
        $quotation = Quotation::findorFail($id);
        $quotation->delete();
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $saleTransaction = SaleTransaction::findorFail($id);
        $saleTransaction->delete();
    }
}
