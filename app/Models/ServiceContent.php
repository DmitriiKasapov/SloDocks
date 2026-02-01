<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceContent extends Model
{
    protected $fillable = [
        'service_id',
        'content',
        'image',
        'hidden_text_1',
        'hidden_file_path_1',
        'hidden_file_path_2',
        'hidden_links',
        'hidden_text_2',
        'hidden_image',
        'status',
    ];

    protected $casts = [
        'hidden_links' => 'array',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
