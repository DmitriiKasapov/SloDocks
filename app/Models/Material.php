<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'service_id',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function blocks(): HasMany
    {
        return $this->hasMany(MaterialBlock::class)->orderBy('order');
    }

    public function activeBlocks(): HasMany
    {
        return $this->hasMany(MaterialBlock::class)
            ->where('is_active', true)
            ->orderBy('order');
    }
}
