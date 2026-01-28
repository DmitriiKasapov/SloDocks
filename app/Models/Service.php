<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
