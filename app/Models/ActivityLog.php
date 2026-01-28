<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'event_type',
        'email',
        'service_id',
        'purchase_id',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];
}
