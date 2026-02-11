{{--
  elements__button__index

  Universal Button Component

  @param string $variant - Variant: 'primary', 'secondary' (default: 'primary')
  @param string $size - Size: 'sm', '', 'lg' (default: '')
  @param string $href - URL if button is a link (if provided, renders <a>, otherwise <button>)
  @param bool $submit - If true, type="submit" (only for <button>)
  @param string $arrow - Arrow direction: 'left', 'right', or empty (default: '')
  @param string $class - Additional CSS classes

  Examples:
  <x-elements.button.index>Buy</x-elements.button.index>
  <x-elements.button.index variant="secondary">Cancel</x-elements.button.index>
  <x-elements.button.index href="/">Go to home</x-elements.button.index>
  <x-elements.button.index submit="true">Submit</x-elements.button.index>
  <x-elements.button.index href="/" arrow="right">Continue</x-elements.button.index>
  <x-elements.button.index href="/" arrow="left">Back</x-elements.button.index>
--}}

@props([
  'variant' => 'primary',
  'size' => 'lg',
  'href' => '',
  'submit' => false,
  'arrow' => '',
  'class' => '',
])

@php
  $baseClasses = 'btn';
  $variantClasses = match($variant) {
    'primary' => 'btn-primary',
    'secondary' => 'btn-secondary',
    default => 'btn-primary',
  };
  $sizeClasses = match($size) {
    'sm' => 'btn-sm',
    'lg' => 'btn-lg',
    default => '',
  };
  $classes = trim("{$baseClasses} {$variantClasses} {$sizeClasses} {$class}");

  // Arrow size depends on button size
  $arrowSize = match($size) {
    'sm' => 'w-4 h-4',
    'lg' => 'w-6 h-6',
    default => 'w-5 h-5',
  };

  // Arrow SVG - base arrow is left, right arrow is rotated 180deg
  $arrowLeft = '<svg class="' . $arrowSize . ' btn-arrow btn-arrow-left" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>';
  $arrowRight = '<svg class="' . $arrowSize . ' btn-arrow btn-arrow-right rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>';
@endphp

@if ($href)
  <a href="{{ $href }}" class="elements__button__index {{ $classes }}">
    @if($arrow === 'left')
      {!! $arrowLeft !!}
    @endif
    <span>{{ $slot }}</span>
    @if($arrow === 'right')
      {!! $arrowRight !!}
    @endif
  </a>
@else
  <button type="{{ $submit ? 'submit' : 'button' }}" class="elements__button__index {{ $classes }}">
    @if($arrow === 'left')
      {!! $arrowLeft !!}
    @endif
    <span>{{ $slot }}</span>
    @if($arrow === 'right')
      {!! $arrowRight !!}
    @endif
  </button>
@endif
