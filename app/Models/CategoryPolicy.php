<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryPolicy extends Model
{
    use HasFactory;

    protected $fillable = ['id','name'];

    /**
     * Validation
     * @return string[]
     */
    public static function rule()
    {
        return [
            'name' => 'required|min:3',
        ];
    }

    /**
     * RelationShip Policy && CategoryPolicy
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policies():HasMany
    {
        return $this->hasMany(Policy::class,'category_policy_id','id');
    }
}
