<?php
namespace App\Repositories\Interfaces;

Interface PurchaseTransactionRepositoryInterface{

    public function alltransactions();
    public function getTransactionsForPartReceiving();
    public function store($data);
    public function findTransaction($id);
    public function update($data, $id);
    public function destroy($id);
    public function recieveStock($id);
    public function recieveSpecificStock($id);
}
