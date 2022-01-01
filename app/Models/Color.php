<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code'];

    public static function rules()
    {
        return [
            'code' => 'required|min:5|max:7|starts_with:#',
            'name' => 'required|min:2|max:255',
        ];
    }
}
