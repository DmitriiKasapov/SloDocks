<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'category_id',
        'description_public',
        'content',
        'image',
        'price',
        'access_duration_days',
        'seo_title',
        'seo_description',
        'is_active',
        'hidden_text_1',
        'hidden_file_path_1',
        'hidden_file_path_2',
        'hidden_links',
        'hidden_text_2',
        'hidden_image',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'integer',
        'access_duration_days' => 'integer',
        'hidden_links' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function accesses(): HasMany
    {
        return $this->hasMany(Access::class);
    }
}
