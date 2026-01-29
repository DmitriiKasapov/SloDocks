<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
