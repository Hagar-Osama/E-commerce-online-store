<?php

namespace App\Http\Repositories\EndUser;


use App\Http\Interfaces\EndUser\UserInterface;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserRepository implements UserInterface
{
    private $cartModel;
    private $orderModel;
    public function __construct(Cart $cart, Order $order)
    {
        $this->cartModel = $cart;
        $this->orderModel = $order;
    }


    public function userLoginPage()
    {
        if(!is_null(auth()->user()))
        {
            $carts = $this->cartModel::where('user_id', auth()->user()->id)->get()->append('Detail');
        }else{
            $carts = [];
        }
        return view('endUser.login', compact('carts'));
    }

    public function login($request)
    {
        $user = $request->only('email', 'password');

        if (auth()->attempt($user)) {

            return redirect(route('home', ['en']));
        }
        Session()->flash('error', 'Email or Password May Be Wrong, Try Again');
        return redirect()->back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('home',['en']));
    }

    public function registerPage()
    {
        if(!is_null(auth()->user()))
        {
            $carts = $this->cartModel::where('user_id', auth()->user()->id)->get()->append('Detail');
        }else{
            $carts = [];
        }

        return view('endUser.register', compact('carts'));
    }

    public function register($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        $role = Role::where('name', 'user')->first();

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);
        Auth::login($user);
        return redirect(route('home',['en']));
    }

    public function profile()
    {
        if(! is_null(auth()->user()))
        {
            $carts = $this->cartModel::where('user_id', auth()->user()->id)->get()->append('Detail');
            $orders = $this->orderModel::where('user_id', auth()->user()->id)->get();
            return view('endUser.profile', compact('carts', 'orders'));

        }
        else{
            $carts = [];

            return redirect(route('user.loginPage', ['en']));

        }



    }


}
