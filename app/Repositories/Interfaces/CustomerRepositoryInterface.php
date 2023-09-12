<?php
namespace App\Repositories\Interfaces;

Interface CustomerRepositoryInterface{

    public function allCustomers();
    public function store($data);
    public function findCustomer($id);
    public function update($data, $id);
    public function destroy($id);
}
