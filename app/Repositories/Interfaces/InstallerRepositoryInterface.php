<?php
namespace App\Repositories\Interfaces;

Interface InstallerRepositoryInterface{

    public function allInstallers();
    public function allInstallersNonPaginated();
    public function store($data);
    public function findInstaller($id);
    public function update($data, $id);
    public function destroy($id);
}
