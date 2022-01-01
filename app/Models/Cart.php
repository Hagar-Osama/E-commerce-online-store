<?php

namespace App\Models;

use App\Rules\StockValidation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['count', 'user_id', 'product_detail_id'];


    public static function rules()
    {
         return [
            'size_id' => 'required|exists:product_details,id',
            'color_id' => 'required|exists:product_details,id',
        ];
    }

    public static function stockRule()
    {
        return [
            'stock' => ['required', new StockValidation( request('product_detail_id'))],
        ];
    }

    public function userCart()
    {
        return $this->belongsTo(User::class);
    }

    public function productDetail()
    {
        return $this->belongsTo(ProductDetails::class);
    }

    public function getDetailAttribute()
    {
        $data = [];
        $productDetail = ProductDetails::where('id', $this->product_detail_id)->with('size', 'color', 'products')->first();
        if($productDetail)
        {
            $data = [
                'image'=>$productDetail->image,
                'size'=>$productDetail->size->name,
                'color'=>$productDetail->color->name,
                'name'=>$productDetail->products->name,
                'price'=>$productDetail->products->price,

            ];
        }
        return $data;
    }



}
