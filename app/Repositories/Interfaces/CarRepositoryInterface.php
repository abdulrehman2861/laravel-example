<?php
namespace App\Repositories\Interfaces;

Interface CarRepositoryInterface{

    public function allCars();
    public function store($data);
    public function findCar($id);
    public function update($data, $id);
    public function destroy($id);
}
