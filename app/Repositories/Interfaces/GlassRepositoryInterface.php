<?php
namespace App\Repositories\Interfaces;

Interface GlassRepositoryInterface{

    public function allGlasses();
    public function allGlassesNonPaginated();
    public function store($data);
    public function findGlass($id);
    public function update($data, $id);
    public function destroy($id);
}
