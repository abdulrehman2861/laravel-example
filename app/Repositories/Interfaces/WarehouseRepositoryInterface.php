<?php
namespace App\Repositories\Interfaces;

Interface WarehouseRepositoryInterface{

    public function allWarehouses();
    public function allWarehousesNonPaginated();
    public function store($data);
    public function findWarehouse($id);
    public function update($data, $id);
    public function destroy($id);
}
