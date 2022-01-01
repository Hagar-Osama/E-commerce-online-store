<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\WishListInterface;
use App\Http\Requests\StoreWishlistRequest;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    private $wishList;

    public function __construct(WishListInterface $wishList)
    {
        $this->wishList = $wishList;
    }

    public function index()
    {
        return $this->wishList->index();
    }

    public function store(StoreWishlistRequest $request)
    {
        return $this->wishList->store($request);
    }

    public function destroy($id)
    {
        return $this->wishList->destroy($id);
    }

}
