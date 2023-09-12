<?php
namespace App\Repositories\Interfaces;

Interface UserRepositoryInterface{

    public function allUsers();
    public function store($data);
    public function findUser($id);
    public function update($data, $id);
    public function destroy($id);
}
