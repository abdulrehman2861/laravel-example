<?php
namespace App\Repositories\Interfaces;

Interface CarCompanyRepositoryInterface{

    public function allCompanies();
    public function allCompaniesNonpaginated();
    public function store($data);
    public function findCompany($id);
    public function update($data, $id);
    public function destroy($id);
}
