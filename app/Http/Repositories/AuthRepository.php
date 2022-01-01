<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class AuthRepository implements AuthInterface
{

    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user_data = $request->only('email','password');

        if (auth()->attempt($user_data)) {

            return redirect(route('admin.index'));
        }
        session()->flash('error','Email Or Password Is Wrong');
        return redirect()->back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('loginPage'));
    }
}
