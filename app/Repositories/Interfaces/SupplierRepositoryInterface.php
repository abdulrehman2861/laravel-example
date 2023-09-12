<?php
namespace App\Repositories\Interfaces;

Interface SupplierRepositoryInterface{

    public function allSuppliers();
    public function allSuppliersNonPaginated();
    public function store($data);
    public function findSupplier($id);
    public function update($data, $id);
    public function destroy($id);
}
