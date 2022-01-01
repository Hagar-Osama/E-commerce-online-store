<?php
namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\CartInterface;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\ProductDetails;

class CartRepository implements CartInterface
{
    private $cartModel,
            $orderModel,
            $orderDetailsModel,
            $productDetailsModel;

    public function __construct(Cart $cart, Order $order, OrderDetails $orderDetails, ProductDetails $productDetails)
    {
        $this->cartModel = $cart;
        $this->orderModel = $order;
        $this->orderDetailsModel = $orderDetails;
        $this->productDetailsModel = $productDetails;
    }
    public function index()
    {
        $carts = $this->cartModel::where('user_id', auth()->user()->id)->get()->append('Detail');

        $subTotal = 0;
        foreach ($carts as $cart)
        {
            $subTotal += $cart->detail['price'] * $cart->count;
        }


        return view('EndUser.cart', compact('carts', 'subTotal'));
    }

    public function addToCart($request)
    {
        $cartItem = $this->cartModel::where([ ['product_detail_id', request('product_detail_id')] , ['user_id', auth()->user()->id] ])->first();
        $isUpdated = false;
        if($cartItem)
        {
            $cartItem->update([
                'count' => $cartItem->count + $request->stock
            ]);
            $isUpdated = true;
        }else
        {
            $this->cartModel::create([
                'product_detail_id' => request('product_detail_id'),
                'user_id' => auth()->user()->id,
                'count'=>$request->stock
            ]);
        }

        return $isUpdated;
    }

    public function destroy($id)
    {
        if($cart = $this->cartModel::find($id))
        {
            $cart->delete();
            session()->flash('done', 'item was deleted');
            return redirect()->back();
        }

        return redirect()->back()->withErrors('item', 'cart item was not found');
    }

    public function checkout()
    {
        $carts = $this->cartModel::where('user_id', auth()->user()->id)->with('productDetail')->get()->append('Detail');
        $total = 0;
        foreach ($carts as $cart)
        {
            if($cart->count > $cart->productDetail->stock)
            {
                return redirect()->back()->withErrors(['product out of stock, cart_id ' . $cart->id]);
            }
            $total += $cart->count * $cart->detail['price'];
        }

        $order = $this->orderModel::create([
            'user_id' => auth()->user()->id,
            'address_id' => auth()->user()->DefaultAddress,
            'total' => $total
        ]);


        foreach ($carts as $cart)
        {
            $this->orderDetailsModel::create([
                'count' => $cart->count,
                'item_price' => $cart->detail['price'],
                'order_id' => $order->id,
                'product_detail_id' => $cart->product_detail_id
            ]);

            $this->productDetailsModel::find($cart->product_detail_id)->decrement('stock', $cart->count);
            $cart->delete();
        }

        return redirect()->back()->with('done', 'Order Was Created');


    }

    public function ordersPage()
    {
        if(!is_null(auth()->user()))
        {
            $carts = $this->cartModel::where('user_id', auth()->user()->id)->get()->append('Detail');
            $orders = $this->orderModel::where('user_id', auth()->user()->id)->get();
            return view('endUser.orders', compact('carts', 'orders'));
        }else{
            $carts = [];
        }

    }
}
