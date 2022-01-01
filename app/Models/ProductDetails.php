<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductDetails extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'stock', 'product_id', 'size_id', 'color_id'];

    public static function sheetRules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'stock' => 'required'
        ];
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    /**
     * RelationShip Size && ProductDetails
     * @return BelongsTo
     */
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    /**
     * Relationship Color && ProductDetails
     * @return BelongsTo
     */
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    /**
     * Relationship ProductDetails && OrderDetails
     * @return HasMany
     */
    public function oderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }

    /**
     * Relationship Carts && ProductDetails
     * @return HasMany
     */
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_detail_id', 'id');
    }
}
