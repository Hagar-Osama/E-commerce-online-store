<?php

namespace App\Http\Interfaces\EndUser;

interface CartInterface
{
    public function index();
    public function addToCart($request);
    public function destroy($id);
    public function checkout();
    public function ordersPage();

}
