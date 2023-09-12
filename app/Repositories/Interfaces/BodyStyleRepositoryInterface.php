<?php
namespace App\Repositories\Interfaces;

Interface BodyStyleRepositoryInterface{

    public function allBodyStyles();
    public function store($data);
    public function findBodyStyle($id);
    public function update($data, $id);
    public function destroy($id);
}
