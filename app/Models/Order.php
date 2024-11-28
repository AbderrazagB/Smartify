<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'number',
        'total_price',
        'ref_ord',
        'state',

    ];
        protected $attributes = [
        'name'=> '',
        'address'=> '',
        'number'=> 0,
        'ref_ord' => '',
        'state'=> 0,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
