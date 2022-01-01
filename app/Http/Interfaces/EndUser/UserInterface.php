<?php
namespace App\Http\Interfaces\EndUser;

interface UserInterface
{
    public function userLoginPage();
    public function login($request);
    public function logout();
    public function registerPage();
    public function register($request);
    public function profile();
}
