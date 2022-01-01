<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\AddressInterface;
use App\Models\Address;
use Illuminate\Support\Facades\Session;

class AddressRepository implements AddressInterface
{
    private $addressModel;

    public function __construct(Address $address)
    {
        $this->addressModel = $address;
    }

    public function index()
    {
        return view('endUser.address');
    }

    public function storeAddress($request)
    {
        try {
            $this->addressModel::create([
                'city' => $request->city,
                'details' => $request->details,
                'user_id' => auth()->user()->id,
                'is_default' => isset($request->is_default) ? $request->is_default : 0
            ]);
            Session::flash('done', 'Address Added Success');
            return back();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
