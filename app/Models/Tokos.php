<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasOne, HasMany};

class Tokos extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'alamat',
        'no_telp',
        'banner_image',
        'cover_image',
    ];

    public function user(): HasOne{
        return $this->hasOne(User::class);
    }
    public function products(): HasMany{
        return $this->hasOne(Product::class);
    }
}
