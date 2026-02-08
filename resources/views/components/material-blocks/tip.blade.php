{{--
  material-blocks__tip

  Tip Block Component

  Colored callout block for tips, warnings, and info
--}}

@props(['content'])

@php
    $colors = [
        'info' => [
            'bg' => 'gradient-tip-info',
            'border' => 'border-blue-400',
            'icon_bg' => 'bg-blue-400',
            'text' => 'text-blue-800',
            'icon' => '💡',
        ],
        'warning' => [
            'bg' => 'gradient-tip-warning',
            'border' => 'border-amber-400',
            'icon_bg' => 'bg-amber-400',
            'text' => 'text-amber-800',
            'icon' => '⚠️',
        ],
        'success' => [
            'bg' => 'gradient-tip-success',
            'border' => 'border-emerald-500',
            'icon_bg' => 'bg-emerald-500',
            'text' => 'text-emerald-800',
            'icon' => '✅',
        ],
    ];

    $level = $content['level'] ?? 'info';
    $style = $colors[$level] ?? $colors['info'];
@endphp

<div class="material-blocks__tip {{ $style['bg'] }} border-l-4 {{ $style['border'] }} rounded-xl p-6 mb-8 shadow-sm">
    <div class="flex items-start gap-4">
        <div class="flex-shrink-0">
            <div class="w-10 h-10 {{ $style['icon_bg'] }} rounded-full flex items-center justify-center">
                <span class="text-xl">{{ $style['icon'] }}</span>
            </div>
        </div>
        <div class="flex-grow {{ $style['text'] }} prose prose-sm max-w-none">
            {!! $content['text'] ?? '' !!}
        </div>
    </div>
</div>
