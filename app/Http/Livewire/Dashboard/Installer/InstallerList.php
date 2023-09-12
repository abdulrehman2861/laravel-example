<?php

namespace App\Http\Livewire\Dashboard\Installer;

use App\Repositories\Interfaces\InstallerRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class InstallerList extends Component
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

    private $installerRepository;

    /**
     * boot
     *
     * @param  mixed $installerRepository
     * @return void
     */
    public function boot(InstallerRepositoryInterface $installerRepository)
    {
        $this->installerRepository = $installerRepository;
    }

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

        return view('livewire.dashboard.installer.installer-list', [
            'installers' => $this->installerRepository->allInstallers($this->searchKey, $this->perPage),
        ]);
    }
}
