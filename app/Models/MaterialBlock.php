<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialBlock extends Model
{
    protected $fillable = [
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

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    // Block type constants
    public const TYPE_TEXT = 'text';
    public const TYPE_PROCESS_OVERVIEW = 'process_overview'; // Deprecated: auto-generated on frontend
    public const TYPE_STEPS = 'steps';
    public const TYPE_TIP = 'tip';
    public const TYPE_DOWNLOADS = 'downloads';
    public const TYPE_EXAMPLES = 'examples';
    public const TYPE_FAQ = 'faq';
    public const TYPE_HELP_CTA = 'help_cta';

    public static function getTypes(): array
    {
        return [
            self::TYPE_TEXT => 'Текст',
            // self::TYPE_PROCESS_OVERVIEW => 'Обзор шагов', // Auto-generated on frontend
            self::TYPE_STEPS => 'Шаг',
            self::TYPE_TIP => 'Совет',
            self::TYPE_DOWNLOADS => 'Файлы для скачивания',
            self::TYPE_EXAMPLES => 'Образцы',
            self::TYPE_FAQ => 'Вопросы и ответы',
            self::TYPE_HELP_CTA => 'Блок помощи',
        ];
    }
}
