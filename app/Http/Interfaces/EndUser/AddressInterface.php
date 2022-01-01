<?php

namespace App\Http\Interfaces\EndUser;

interface AddressInterface
{
    public function index();

    public function storeAddress($request);
}
