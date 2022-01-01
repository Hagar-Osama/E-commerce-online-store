<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    private $authInterface;
    public function __construct(AuthInterface $auth)
    {
        $this->authInterface = $auth;
    }

    public function index()
    {
        return $this->authInterface->loginPage();
    }

    public function login(AuthRequest $request)
    {
        return $this->authInterface->login($request);
    }

    public function logout()
    {
        return $this->authInterface->logout();
    }
}
