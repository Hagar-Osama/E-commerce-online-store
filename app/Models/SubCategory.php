<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'category_id'];

    /**
     * Validation Rules
     * @return string[]
     */
    public static function rule()
    {
        return [
            'name' => 'required|min:3',
            'image' => 'required|mimes:webp,jpg,png,jpeg',
            'select' => 'required|exists:categories,id'
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
