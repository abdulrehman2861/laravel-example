<?php
namespace App\Repositories\Interfaces;

Interface InventoryManagementRepositoryInterface{

    public function allInventory();
    public function exportInventory();
    public function importInventory($data);
    public function clearInventoryColumn($operation_type, $id_arr = [],$operation_on,$column_name);
}
