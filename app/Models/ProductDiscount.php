<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;

    protected $fillable = ['percentage', 'amount', 'expired', 'status', 'product_id'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
