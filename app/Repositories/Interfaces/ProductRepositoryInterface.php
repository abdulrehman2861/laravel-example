<?php
namespace App\Repositories\Interfaces;

Interface ProductRepositoryInterface{

    public function allProducts();
    public function store($data);
    public function findProduct($id);
    public function update($data, $id);
    public function destroy($id);
}
