<?php

namespace App\Http\Livewire\Dashboard\UserManagement;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleList extends Component
{

    use WithPagination;

    /**
     * paginationTheme
     *
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * searchKey
     * perPage
     *
     * @var string
     * @var int
     */
    public $searchKey = '',
        $perPage = 10;


    /**
     * updatingSearchKey
     *
     * @return void
     */
    public function updatingSearchKey()
    {

        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.dashboard.user-management.role-list', [

            'roles' => Role::where('name', 'LIKE', "%{$this->searchKey}%")
                            ->latest()
                            ->notSudo()
                            ->paginate($this->perPage),

        ]);
    }
}
