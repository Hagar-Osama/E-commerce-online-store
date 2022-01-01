<?php
namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\AdsTrait;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\ProductsTrait;
use App\Http\Traits\SliderTrait;
use App\Http\Traits\SubCategoriesTrait;
use App\Models\Ads;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\WishList;

class HomeRepository implements HomeInterface
{
    use SliderTrait;
    use AdsTrait;
    use CategoryTrait;
    use SubCategoriesTrait;
    use ProductsTrait;

    private $cartModel;
    private $wishListModel;
    private $sliderModel;
    private $adModel;
    private $categoryModel;
    private $subCategoryModel;
    private $productModel;

    public function __construct(Cart $cart, WishList $wishList, Slider $slider, Ads $ads, Category $category, SubCategory $subCategory, Product $product)
    {
        $this->cartModel = $cart;
        $this->wishListModel = $wishList;
        $this->sliderModel = $slider;
        $this->adModel = $ads;
        $this->categoryModel = $category;
        $this->subCategoryModel = $subCategory;
        $this->productModel = $product;
    }

    public function homePage()
    {
        $sliders = $this->show_all_sliders();
        $ads = $this->show_all_ads();
        $subCategories = $this->show_sub_categories();
        $subCategoriesCount = $this->count_subCategories();
        $products = $this->get_all_products()->append(['Name', 'Sizes', 'FirstSizeColors', 'FistColorStock']);
        if(!is_null(auth()->user()))
        {
            $carts = $this->cartModel::where('user_id', auth()->user()->id)->get()->append('Detail');
            $wishListCount  = $this->wishListModel::where('user_id', auth()->user()->id)->count();
        }else{
            $carts = [];
            $wishListCount = 0;
        }

        return view('endUser.index', compact('carts', 'wishListCount', 'sliders', 'ads', 'subCategories', 'subCategoriesCount', 'products'));
    }
}
