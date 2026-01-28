<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'service_id',
        'email',
        'payment_provider',
        'payment_id',
        'amount',
        'currency',
        'status',
    ];
}
