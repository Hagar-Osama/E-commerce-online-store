<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_detail_id'];

    public function userWishList()
    {
        return $this->belongsTo(User::class);
    }

    public function wishListProducts()
    {
        return $this->belongsTo(Product::class);
    }

    public function productDetails()
    {
        return $this->belongsTo(ProductDetails::class, 'product_detail_id', 'id')->with('size');
    }

    public static function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'color_id' => 'required|exists:product_details,color_id',
            'size_id' => 'required|exists:product_details,size_id'
        ];
    }


    public function getDetailAttribute()
    {
        $data = [];
        $productDetail = ProductDetails::where('id', $this->product_detail_id)->with('size', 'color', 'products')->first();
        if($productDetail)
        {
            $data = [
                'image' => $productDetail->image,
                'size' => $productDetail->size->name,
                'color' => $productDetail->color->name,
                'productName' => $productDetail->products->name,
                'price' => $productDetail->products->price,
            ];
        }
        return $data;
    }
}
