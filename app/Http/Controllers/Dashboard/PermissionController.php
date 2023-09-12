<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('dashboard.usermanagement.index');
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('dashboard.usermanagement.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'   =>"required|string",
            'permissions'   =>"required|array",
            'permissions.*' =>"string",
        ]);

        $role = Role::create(['name' => $request->name]);

        foreach ($request->permissions as $key => $subPermission)
        {
            $permission = Permission::where('name', $subPermission)->first();
            if ($permission)
            {

                $role->givePermissionTo($permission->name);

            }
        }

        return redirect()->route('dashboard.permissions.index')->with('success', 'Saved Successfully!');
    }

    public function edit($id): View
    {
        $role = Role::findorFail($id);
        return view('dashboard.usermanagement.edit', compact('role'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'name'   =>"required|string",
            'permissions'   =>"required|array",
            'permissions.*' =>"string",
        ]);

        $role = Role::findorFail($id);

        $role->permissions()->sync([]);

        foreach ($request->permissions as $key => $subPermission)
        {
            $permission = Permission::where('name', $subPermission)->first();
            if ($permission)
            {

                $role->givePermissionTo($permission->name);

            }
        }

        return redirect()->route('dashboard.permissions.index')->with('success', 'Role Updated Successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $role = Role::findorFail($id);
        if ( $role->users->count() > 0)
        {
            return back()->withErrors(['Cannot Delete! Role have associated users.']);
        }
        $role->delete();

        return redirect()->route('dashboard.permissions.index')->with('success', 'Role Deleted Successfully');
    }
}
