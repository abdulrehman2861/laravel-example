<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
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
        return view('livewire.dashboard.user.user-list',[

        'users' => User::where('name', 'LIKE', "%{$this->searchKey}%")
                        ->where('type',User::TYPE_ADMIN)
                        ->latest()
                        ->paginate($this->perPage),

    ]);
    }
}
