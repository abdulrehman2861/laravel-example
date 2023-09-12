<?php

namespace App\Http\Livewire\Dashboard\Workorder;

use Livewire\Component;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;

class Comment extends Component
{

    /**
     * listeners
     *
     * @var array
     */
    protected $listeners = ['commentFormDataSubmitted' => 'storeComment'];


    public $transaction,
        $transaction_id,
        $content;

    private $saleTransactionRepository,
                $commentRepository;


    /**
     * mount
     *
     * @param  mixed $transaction_id
     * @return void
     */
    public function mount($transaction_id)
    {
        $this->transaction_id = $transaction_id;
        $this->transaction = $this->saleTransactionRepository->findTransaction($this->transaction_id);
    }

    /**
     * boot
     *
     * @param  mixed $customerRepository
     * @return void
     */
    public function boot(
        SaleTransactionRepositoryInterface $saleTransactionRepository,
        CommentRepositoryInterface $commentRepository,
    ) {
        $this->saleTransactionRepository = $saleTransactionRepository;
        $this->commentRepository = $commentRepository;




    }

    public function render()
    {
        return view('livewire.dashboard.workorder.comment');
    }

    /**
     * storeComment
     *
     * @return void
     */
    public function storeComment($content)
    {
        if ($content != '' && $content != null && $this->transaction_id != null)
        {
            $data['content'] = $content;
            $data['sale_transaction_id'] = $this->transaction_id;
            $this->commentRepository->store($data);
        }

        $this->transaction->refresh();
    }
}
