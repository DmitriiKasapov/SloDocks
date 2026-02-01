<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialBlock extends Model
{
    protected $fillable = [
        'material_id',
        'service_id',
        'type',
        'title',
        'content',
        'order',
        'is_active',
    ];

    protected $casts = [
        'content' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    // Block type constants
    public const TYPE_INTRO = 'intro';
    public const TYPE_PROCESS_OVERVIEW = 'process_overview';
    public const TYPE_STEPS = 'steps';
    public const TYPE_TIP = 'tip';
    public const TYPE_DOWNLOADS = 'downloads';
    public const TYPE_EXAMPLES = 'examples';
    public const TYPE_FAQ = 'faq';
    public const TYPE_HELP_CTA = 'help_cta';

    public static function getTypes(): array
    {
        return [
            self::TYPE_INTRO => 'Intro',
            self::TYPE_PROCESS_OVERVIEW => 'Process Overview',
            self::TYPE_STEPS => 'Steps',
            self::TYPE_TIP => 'Tip',
            self::TYPE_DOWNLOADS => 'Downloads',
            self::TYPE_EXAMPLES => 'Examples',
            self::TYPE_FAQ => 'FAQ',
            self::TYPE_HELP_CTA => 'Help CTA',
        ];
    }
}
