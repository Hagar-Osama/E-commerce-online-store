<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = ['count', 'item_price', 'order_id', 'product_detail_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function productDetail()
    {
        return $this->belongsTo(ProductDetails::class);
    }
}
