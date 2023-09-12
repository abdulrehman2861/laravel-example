<?php
namespace App\Repositories\Interfaces;

Interface CurrencyRepositoryInterface{

    public function allCurrency();
    public function store($data);
    public function update($data, $id);
    public function findCurrency($id);
}
