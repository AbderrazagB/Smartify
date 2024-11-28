<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'produit_id',
        'qnt',
        'ord_ref',
        'state',

    ];
    protected $attributes = [
        'ord_ref' => '',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }

}
