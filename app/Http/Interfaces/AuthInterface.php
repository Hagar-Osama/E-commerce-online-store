<?php
namespace App\Http\Interfaces;



use Illuminate\Http\Request;

interface AuthInterface
{
    public function loginPage();

    public function login(Request $request);

    public function logout();
}
