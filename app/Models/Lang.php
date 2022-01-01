<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lang extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Relationship Products && ProductName
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productNameLang() : HasMany
    {
        return $this->hasMany(ProductName::class, 'lang_id', 'id');
    }
}
