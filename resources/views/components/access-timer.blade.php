{{--
  access-timer

  Access Timer Component

  Displays remaining access time with color-coded status
--}}

@props(['access'])

@php
    $daysRemaining = $access->daysRemaining();
    $isExpiringSoon = $access->isExpiringSoon();
    $message = $access->getTimeRemainingMessage();

    // Determine color scheme based on days remaining
    if ($daysRemaining === 0) {
        $bgColor = 'bg-red-50';
        $borderColor = 'border-red-200';
        $textColor = 'text-red-800';
        $iconColor = 'text-red-600';
    } elseif ($isExpiringSoon) {
        $bgColor = 'bg-amber-50';
        $borderColor = 'border-amber-200';
        $textColor = 'text-amber-800';
        $iconColor = 'text-amber-600';
    } else {
        $bgColor = 'bg-green-50';
        $borderColor = 'border-green-200';
        $textColor = 'text-green-800';
        $iconColor = 'text-green-600';
    }
@endphp

<div class="{{ $bgColor }} {{ $borderColor }} border rounded-xl p-4 mb-6">
    <div class="flex items-start gap-3">
        <div class="flex-shrink-0">
            <svg class="w-5 h-5 {{ $iconColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="flex-grow">
            <p class="text-sm font-medium {{ $textColor }}">
                {{ $message }}
            </p>
            <p class="text-xs {{ $textColor }} opacity-75 mt-1">
                Доступ до {{ $access->expires_at->format('d.m.Y в H:i') }}
            </p>
        </div>
    </div>
</div>
