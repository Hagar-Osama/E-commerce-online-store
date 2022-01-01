<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public static function rule()
    {
        return [
            'name' => 'required|min:3'
        ];
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class,'category_id','id');
    }
}
