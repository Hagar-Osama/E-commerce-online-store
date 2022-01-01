<?php
namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\productsInterface as AdminProductsInterface;
use App\Http\Traits\ImagesTrait;
use App\Imports\ProductImport;
use App\Imports\ProductUpdate;
use App\Models\Cart;
use App\Models\Lang;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductsRepository implements AdminProductsInterface
{
    private $productsModel;
    private $productDetailsModel;
    private $cartModel;

    public function __construct(Product $product, ProductDetails $productDetail, Cart $cart)
    {
        $this->productsModel = $product;
        $this->productDetailsModel = $productDetail;
        $this->cartModel = $cart;

    }

    public function subCategoryProducts($subCategoryId, $lang)
    {
        $products = $this->productsModel::get()->append('Name');
        $carts = $this->cartModel::where('user_id', auth()->user()->id)->get()->append('Detail');


        return view('endUser.products', compact('products', 'carts'));
    }

    public function productDetail($productId, $lang)
    {
        $product = $this->productsModel::where('id', $productId)->first()
            ->append(['Name', 'Sizes', 'FirstSizeColors', 'FistColorStock']);
            $carts = $this->cartModel::where('user_id', auth()->user()->id)->get()->append('Detail');
        return view('endUser.productDetails', compact('product', 'carts'));

    }
}
