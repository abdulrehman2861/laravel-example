<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Dashboard\InstallerRequest;
use App\Repositories\Interfaces\InstallerRepositoryInterface;

class InstallerController extends Controller
{

    private $installerRepository;

    /**
     * __construct
     *
     * @param  mixed $installerRepository
     * @return void
     */
    public function __construct(InstallerRepositoryInterface $installerRepository)
    {
        $this->installerRepository = $installerRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View|string
    {
        $installers =  $this->installerRepository->allInstallers();

        return view('dashboard.installer.index', compact('installers'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.installer.create');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(InstallerRequest $request): RedirectResponse
    {
        $this->installerRepository->store($request->validated());

        return redirect()->route('dashboard.installer.index')->with('success', 'Saved Successfully!');
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $installer = $this->installerRepository->findInstaller($id);

        return view('dashboard.installer.edit', compact('installer'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(InstallerRequest $request, $id): RedirectResponse
    {
        $this->installerRepository->update($request->validated(), $id);

        return redirect()->route('dashboard.installer.index')->with('success', 'installer Updated Successfully!');
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->installerRepository->destroy($id);

        return redirect()->route('dashboard.installer.index')->with('message', 'installer Deleted Successfully');
    }
}
