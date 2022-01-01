<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'details', 'is_default', 'user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
