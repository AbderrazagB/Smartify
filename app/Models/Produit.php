<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'qntStock',
        'category',
        'details',
        'pic',

    ];
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

}
