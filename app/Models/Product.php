<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'rating',
        'gambar',
        'toko_id',
        'qty',
        'category_id',
    ];
    
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Tokos::class);
    }

    public function keranjang(): HasMany {
        return $this->hasMany(Keranjang::class);
    }
}
