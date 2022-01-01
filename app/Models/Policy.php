<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Policy extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'description', 'category_policy_id'];

    /**
     * Validation
     * @return string[]
     */
    public static function rule()
    {
        return [
            'name' => 'required|min:3',
            'select' => 'required|exists:category_policies,id',
            'description' => 'required|min:10'
        ];
    }
    /**
     * Relationship CategoryPolicy && Policy
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryPolicy() :BelongsTo
    {
        return $this->belongsTo(CategoryPolicy::class,'category_policy_id','id');
    }
}
