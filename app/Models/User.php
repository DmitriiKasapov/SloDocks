<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email',
        'first_purchase_at',
        'last_purchase_at',
        'purchases_count',
    ];

    protected $casts = [
        'first_purchase_at' => 'datetime',
        'last_purchase_at' => 'datetime',
    ];
}
