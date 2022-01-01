<?php
namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\WishListInterface;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\WishList;

class WishListRepository implements WishListInterface
{
    private $wishlistModel;
    private $productDetailsModel;
    private $cartModel;

    public function __construct(WishList $wishList, ProductDetails $productDetails, Cart $cart)
    {
        $this->wishlistModel = $wishList;
        $this->productDetailsModel = $productDetails;
        $this->cartModel = $cart;
    }

    public function index()
    {
        $items = $this->wishlistModel::where('user_id', auth()->user()->id)->get()->append('Detail');
        $carts = $this->cartModel::where('user_id', auth()->user()->id)->get()->append('Detail');

        return view('endUser.wishlist', compact('items', 'carts'));
    }

    public function store($request)
    {
        $productDetail = $this->productDetailsModel::where([
            ['product_id', $request->product_id],
            ['color_id', $request->color_id],
            ['size_id', $request->size_id]])->select('id')->first();

        $this->wishlistModel::create([
            'product_detail_id' => $productDetail->id,
            'user_id' => auth()->user()->id
        ]);

        return true;
    }

    public function destroy($id)
    {
        $wishList = $this->wishlistModel::find($id);
        if($wishList)
        {
            $wishList->delete();
            session()->flash('WishList Item Was Deleted');
            return redirect()->back();
        }

        return redirect()->back()->withErrors(['item', 'Wish List Item Not Found']);

    }
}
