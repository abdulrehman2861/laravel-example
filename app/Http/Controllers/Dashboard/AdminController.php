<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View
    {

        return view('dashboard.auth.login');
    }

    /**
     * login
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function loginProcess(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attemptWhen($credentials, function (User $user) {
            return $user->type == User::TYPE_ADMIN;
        })) {
            return redirect()->intended(route('dashboard.home'))->with('success', 'Login Successfull!');
        }

        return back()->withErrors([
            'mismatch' => 'Wrong Credentials. Try again',
        ]);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.login'))->with('success', 'Logout Successfull!');
    }

    public function uploadImage(Request $request) :JsonResponse
    {
        $file = $request->file;
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/images', $filename);


        return response()->json([
            'data' => Storage::url($path)
        ]);
    }
}
