<?php
namespace App\Repositories\Interfaces;

Interface YearRepositoryInterface{

    public function allYears();
    public function allYearsNonPaginated();
    public function store($data);
    public function findYear($id);
    public function update($data, $id);
    public function destroy($id);
}
