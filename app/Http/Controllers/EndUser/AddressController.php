<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\AddressInterface;
use App\Http\Requests\AddAdressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $addressInterface;

    public function __construct(AddressInterface $address)
    {
        $this->addressInterface = $address;
    }

    public function index()
    {
        return $this->addressInterface->index();
    }

    public function store(AddAdressRequest $request)
    {
        return $this->addressInterface->storeAddress($request);
    }
}
