<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'description_public',
        'price',
        'access_duration_days',
        'seo_title',
        'seo_description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'integer',
        'access_duration_days' => 'integer',
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function accesses(): HasMany
    {
        return $this->hasMany(Access::class);
    }
}
