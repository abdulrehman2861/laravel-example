<?php
namespace App\Repositories\Interfaces;

Interface CartRepositoryInterface{

    public function addProducttoCart($id, $qty = 1, $fitting);
    public function updateCart($data);
    public function deleteCartProduct($id);
    public function calculateTotal();
}
