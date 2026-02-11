{{-- material_blocks__tip --}}

@props(['content', 'class' => ''])

@php
    $colors = [
        'info' => [
            'bg' => 'gradient-tip-info',
            'border' => 'border-blue-400',
            'icon_bg' => 'bg-blue-400',
            'text' => 'text-blue-800',
        ],
        'warning' => [
            'bg' => 'gradient-tip-warning',
            'border' => 'border-amber-400',
            'icon_bg' => 'bg-amber-400',
            'text' => 'text-amber-800',
        ],
        'success' => [
            'bg' => 'gradient-tip-success',
            'border' => 'border-emerald-500',
            'icon_bg' => 'bg-emerald-500',
            'text' => 'text-emerald-800',
        ],
    ];

    $level = $content['level'] ?? 'info';
    $style = $colors[$level] ?? $colors['info'];
@endphp

<div class="{{ $style['bg'] }} border-l-4 {{ $style['border'] }} rounded-xl p-6 shadow-sm {{ $class }}">
    <div class="flex items-start gap-4">
        <div class="shrink-0">
            <div class="w-10 h-10 {{ $style['icon_bg'] }} rounded-full flex items-center justify-center">
                @if($level === 'info')
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"/>
                    </svg>
                @elseif($level === 'warning')
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                @elseif($level === 'success')
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                @endif
            </div>
        </div>
        <div class="flex-grow {{ $style['text'] }} wysiwyg text-base">
            {!! $content['text'] ?? '' !!}
        </div>
    </div>
</div>
