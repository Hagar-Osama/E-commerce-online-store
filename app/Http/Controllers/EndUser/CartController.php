<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\CartInterface;
use App\Http\Requests\AddToCartRequest;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cartInterface;

    public function __construct(CartInterface $cart)
    {
        $this->cartInterface = $cart;

    }
    public function index()
    {
        return$this->cartInterface->index();
    }

    public function addToCart(AddToCartRequest $request)
    {
        return $this->cartInterface->addToCart($request);
    }

    public function destroy($id)
    {
        return $this->cartInterface->destroy($id);
    }

    public function checkout()
    {
        return $this->cartInterface->checkout();
    }

    public function ordersPage()
    {
        return $this->cartInterface->ordersPage();
    }
}
