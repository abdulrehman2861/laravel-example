<?php
namespace App\Repositories\Interfaces;

Interface SaleReturnRepositoryInterface{

    public function allReturns();
    public function store($data);
    public function findReturn($id);
    public function update($data, $id);
    public function destroy($id);
}
