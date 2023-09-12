<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Website\UserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\SaleTransactionRepositoryInterface;

class CustomerController extends Controller
{

    private $userRepository,
                $saleTransactionRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository,SaleTransactionRepositoryInterface $saleTransactionRepository)
    {
        $this->saleTransactionRepository = $saleTransactionRepository;
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

        return view('customer.auth.login');
    }

    public function register(UserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['password'] = Hash::make($request->password);
        $data['type'] = User::TYPE_CUSTOMER;

        $user = $this->userRepository->store($data);

        $user->refresh();

        auth()->login($user);

        return redirect()->intended(route('customer.dashboard.home'))->with('success', 'Registeration Successfull!');

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

        if (Auth::attempt($credentials)) {

            return redirect()->intended(route('customer.dashboard.home'))->with('success', 'Login Successfull!');
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

        return redirect(route('customer.login'))->with('success', 'Logout Successfull!');
    }



    /**
     * workorders
     *
     * @param  mixed $request
     * @return View
     */
    public function workorders(Request $request): View|string
    {
        return view('profile.all-work.all-work');
    }

    /**
     * showWorkorder
     *
     * @param  mixed $id
     * @return View
     */
    public function showWorkorder($id): View
    {
        $transaction = $this->saleTransactionRepository->findTransaction($id);
        return view('profile.all-work.details', compact('transaction'));
    }

    public function uploadfileTrix(Request $request)
    {
        if($request->hasFile('file')) {
            //get filename with extension
            $filenamewithextension = $request->file('file')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            //filename to store
            $filenametostore = sprintf('%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)).'.'.$extension;

            //Upload File
            $request->file('file')->storeAs('public/uploads', $filenametostore);

            // you can save image path below in database
            $path = asset('storage/uploads/'.$filenametostore);

            echo $path;
            exit;
        }
    }
}
