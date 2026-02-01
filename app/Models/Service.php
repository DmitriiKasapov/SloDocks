<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'category_id',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function serviceContent(): HasOne
    {
        return $this->hasOne(ServiceContent::class);
    }

    public function material(): HasOne
    {
        return $this->hasOne(Material::class);
    }

    public function contentBlocks(): HasMany
    {
        return $this->hasMany(MaterialBlock::class)->orderBy('order');
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function accesses(): HasMany
    {
        return $this->hasMany(Access::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'service_tag')
            ->withTimestamps()
            ->orderBy('type')
            ->orderBy('order');
    }
}
