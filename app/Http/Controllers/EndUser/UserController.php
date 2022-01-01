<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\UserInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userInterface;
    public function __construct(UserInterface $userInterface)
    {
         $this->userInterface = $userInterface;

    }

    public function userLoginPage()
    {
        return $this->userInterface->userLoginPage();
    }

    public function login(AuthRequest $request)
    {
        return $this->userInterface->login($request);
    }

    public function logout()
    {
        return $this->userInterface->logout();
    }

    public function registerPage()
    {
        return $this->userInterface->registerPage();
    }

    public function register(RegisterRequest $request)
    {
        return $this->userInterface->register($request);
    }
    public function profile()
    {
        return $this->userInterface->profile();
    }
}
