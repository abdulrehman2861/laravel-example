<?php
namespace App\Repositories\Interfaces;

Interface SaleTransactionRepositoryInterface{

    public function alltransactions();
    public function store($data);
    public function findTransaction($id);
    public function update($data, $id);
    public function destroy($id);
    public function getAllQuotes();
}
