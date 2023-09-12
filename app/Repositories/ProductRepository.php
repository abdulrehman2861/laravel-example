<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductFitting;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{


    /**
     * allProducts
     *
     * @return LengthAwarePaginator
     */
    public function allProducts($search = null, $perpage = 10): LengthAwarePaginator
    {
        return Product::where('part_number', 'LIKE', "%{$search}%")
            ->orWhere('shelf', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->orWhere('quantity', 'LIKE', "%{$search}%")
            ->orWhereHas('warehouse', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate($perpage);
    }

    /**
     * allProductsWithTransactionsPaid
     *
     * @param  mixed $search
     * @param  mixed $perpage
     * @param  mixed $from
     * @param  mixed $to
     * @return LengthAwarePaginator
     */
    public function allProductsWithTransactionsPaid($search = null, $perpage = 10, $from = null, $to = null): LengthAwarePaginator
    {
        $query = Product::query();

        return $query->where(function ($q) use ($search) {
            $q->where('part_number', 'LIKE', "%{$search}%")
                ->orWhere('shelf', 'LIKE', "%{$search}%")
                ->orWhere('price', 'LIKE', "%{$search}%")
                ->orWhere('quantity', 'LIKE', "%{$search}%")
                ->orWhereHas('warehouse', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        })
            ->whereHas('saleTransactionDetails.mainTransaction', function ($query) use ($from, $to) {
                $query->where('payment_status', "Paid")
                    ->when(isset($from) && !empty($from), function ($q2) use ($from) {

                        $q2->whereDate('created_at', '>', $from);
                    })
                    ->when(isset($to) && !empty($to), function ($q3) use ($to) {

                        $q3->whereDate('created_at', '<', $to);
                    });
            })

            ->latest()
            ->paginate($perpage);
    }

    public function allProductsForMultiReport($search = null, $perpage = 10, $supplier_id = null, $warehouse_id = null, $subcategories_id = null, $lowStockProduct = null): LengthAwarePaginator
    {
        $query = Product::query();

        return $query->where(function ($q) use ($search) {
            $q->where('part_number', 'LIKE', "%{$search}%")
                ->orWhere('shelf', 'LIKE', "%{$search}%")
                ->orWhere('price', 'LIKE', "%{$search}%")
                ->orWhere('quantity', 'LIKE', "%{$search}%");
        })

            ->when(isset($lowStockProduct) && !empty($lowStockProduct), function ($q2) {
                $q2->where('quantity', '<=', DB::raw('alert_quantity'));
            })

            ->when(isset($subcategories_id) && !empty($subcategories_id), function ($q2) use ($subcategories_id) {
                $q2->whereHas('productFittings.category', function ($q3) use ($subcategories_id) {
                    $q3->where('id', $subcategories_id);
                });
            })


            ->when(isset($supplier_id) && !empty($supplier_id), function ($q2) use ($supplier_id) {
                $q2->whereHas('purchaseTransactionDetails.mainTransaction.supplier', function ($q3) use ($supplier_id) {
                    $q3->where('id', $supplier_id);
                });
            })
            ->when(isset($warehouse_id) && !empty($warehouse_id), function ($q2) use ($warehouse_id) {
                $q2->whereHas('warehouse', function ($q3) use ($warehouse_id) {
                    $q3->where('id', $warehouse_id);
                });
            })


            ->latest()
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
        $product = Product::create($data);

        foreach (request()->product_fittings as $product_fitting) {
            $product->productFittings()->create($product_fitting);
        }

        $images = [];

        if (request()->filled('images')) {

            foreach (request()->images as $tmpimage) {
                $image = new ProductImage;
                $image->img_url = $tmpimage;
                $images[] = $image;
            }

            $product->images()->saveMany($images);
        }

        return  $product;
    }


    /**
     * findProduct
     *
     * @param  mixed $id
     * @return Model
     */
    public function findProduct($id): Model
    {
        return Product::findorFail($id);
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
        $product = Product::findorFail($id);
        $product->update($data);
        // $product->productFittings()->delete();
        foreach (request()->product_fittings as $product_fitting) {

            $fitting = ProductFitting::find($product_fitting['id']);
            // dd($fitting,$product_fitting['id'],ProductFitting::get()->pluck('id'));
            if ($fitting == null) {
                $product->productFittings()->create($product_fitting);
            } else {
                $fitting->update($product_fitting);
            }
        }

        if (request()->filled('imagesToDelete')) {
            foreach (request()->imagesToDelete as $key => $imgId) {
                $image = ProductImage::where('img_url', $imgId)->where('product_id', $product->id)->First();

                if ($image && Storage::disk('public')->exists($image->img_url)) {
                    Storage::disk('public')->delete($image->img_url);
                }
                if ($image) {
                    //dump($image->img_url,'deleted' );
                    $image->delete();
                }
            }
        }
        //dd(request()->imagesToDelete );
        if (request()->filled('images')) {
            $images = [];

            foreach (request()->images as $tmpImage) {

                $image = new ProductImage;
                $image->img_url = $tmpImage;
                $images[] = $image;
            }

            $product->images()->saveMany($images);
        }



        return  $product;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $product = Product::findorFail($id);
        $product->delete();
    }
}
