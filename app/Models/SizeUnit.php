<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SizeUnit extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function rule()
    {
        return [
            'name' => 'required|min:3',
        ];
    }

    /**
     * RelationShip SizeUnit && Size
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sizes() :HasMany
    {
        return $this->hasMany(Size::class);
    }
}
