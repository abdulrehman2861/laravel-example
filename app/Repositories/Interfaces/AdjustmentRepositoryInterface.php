<?php
namespace App\Repositories\Interfaces;

Interface AdjustmentRepositoryInterface{

    public function allAdjustments();
    public function store($data);
    public function findAdjustment($id);
}
