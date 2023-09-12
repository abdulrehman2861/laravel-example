<?php

namespace App\Repositories;


use App\Models\Car;
use App\Models\Year;
use App\Models\Installer;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Interfaces\InstallerRepositoryInterface;

class InstallerRepository implements InstallerRepositoryInterface
{


    /**
     * allInstallers
     *
     * @return LengthAwarePaginator
     */
    public function allInstallers($search = null, $perpage = 10): LengthAwarePaginator
    {
        return Installer::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('phone', 'LIKE', "%{$search}%")
            ->orWhere('social_security_number', 'LIKE', "%{$search}%")
            ->latest()->paginate($perpage);
    }

    /**
     * allInstallersNonPaginated
     *
     * @return Collection
     */
    public function allInstallersNonPaginated(): Collection
    {
        return Installer::get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return Model
     */
    public function store($data): Model
    {
        // dd($data);
        $installer = Installer::create($data);

        return $installer;
    }


    /**
     * findInstaller
     *
     * @param  mixed $id
     * @return Model
     */
    public function findInstaller($id): Model
    {
        return Installer::findorFail($id);
    }

    /**
     * update
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return model
     */
    public function update($data, $id): model
    {
        $installer = Installer::findorFail($id);
        $installer->update($data);

        return $installer;
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $installer = Installer::findorFail($id);
        $installer->delete();
    }
}
