<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductName extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_id', 'lang_id'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function langs()
    {
        return $this->belongsTo(Lang::class, 'lang_id', 'id');
    }
}
