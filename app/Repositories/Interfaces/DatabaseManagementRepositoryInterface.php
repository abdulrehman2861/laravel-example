<?php
namespace App\Repositories\Interfaces;

Interface DatabaseManagementRepositoryInterface{

    public function exportDatabase();
    public function importDatabase($data);
}
