<?php
namespace App\Repositories\Interfaces;

Interface CustomerTypeRepositoryInterface{

    public function allCustomerTypes();
    public function allCustomerTypesNonPaginated();
    public function store($data);
    public function findCustomerType($id);
    public function findByName($name);
    public function update($data, $id);
    public function destroy($id);
}
