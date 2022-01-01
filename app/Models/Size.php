<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'size_unit_id'];

    public static function rule()
    {
        return [
            'name' => 'required|min:3',
            'select' => 'required|exists:size_units,id',
        ];
    }
    /**
     * RelationShip Size && UnitSize
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unitSize() : BelongsTo
    {
        return $this->belongsTo(SizeUnit::class, 'size_id', 'id');
    }

    /**
     * RelationShip Size && ProductDetails
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productDetailsSize() : HasMany
    {
        return $this->hasMany(ProductDetails::class, 'product_id', 'id');
    }
}
