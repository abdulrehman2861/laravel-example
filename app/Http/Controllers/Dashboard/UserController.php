<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Website\UserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('dashboard.user.index');
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $roles = Role::notSudo()->get();
        return view('dashboard.user.create', compact('roles'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['password'] = Hash::make($request->password);
        $data['type'] = User::TYPE_ADMIN;

        $user = $this->userRepository->store($data);

        $user->refresh();

        if (request()->has('role')) {
            $user->assignRole(request()->role);
        }

        if (request()->has('imageFile')) {
            $file = $request->imageFile;
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $filename);

            $user->image = Storage::url($path);
            $user->save();
        }

        return redirect()->intended(route('dashboard.user.index'))->with('success', 'Save Successfull!');
    }

    public function edit($id): View
    {
        $roles = Role::notSudo()->get();
        $user = $this->userRepository->findUser($id);

        return view('dashboard.user.edit', compact('user','roles'));
    }

    public function update(UserRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        if (request()->has('password') && $request->password != null)
            {
                $data['password'] = Hash::make($request->password);
            }
        $user =$this->userRepository->update($data, $id);
        $user->refresh();

        if (request()->has('role'))
        {
            $user->syncRoles([]);
            $user->assignRole(request()->role);
        }

        return redirect()->route('dashboard.user.index')->with('success', 'User Updated Successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $user = $this->userRepository->findUser($id);
        // if ( $role->users->count() > 0)
        // {
        //     return back()->withErrors(['Cannot Delete! Role have associated users.']);
        // }
        $user->delete();

        return redirect()->route('dashboard.user.index')->with('success', 'User Deleted Successfully');
    }
}
