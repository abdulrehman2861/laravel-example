<?php
namespace App\Repositories\Interfaces;

Interface PurchaseReturnRepositoryInterface{

    public function allReturns();
    public function store($data);
    public function findReturn($id);
    public function update($data, $id);
    public function destroy($id);
}
