{{--
  Button Component

  @param string $variant - Вариант: 'primary', 'secondary'
  @param string $size - Размер: 'sm', '', 'lg'
  @param string $link - URL если кнопка - ссылка
  @param bool $submit - Если true, type="submit"
  @param string $class - Дополнительные CSS классы

  Примеры:
  <x-elements.button.index>Купить</x-elements.button.index>
  <x-elements.button.index variant="secondary">Отменить</x-elements.button.index>
  <x-elements.button.index link="/">Перейти</x-elements.button.index>
  <x-elements.button.index submit="true">Отправить</x-elements.button.index>
--}}

@props([
  'variant' => 'primary',
  'size' => '',
  'link' => '',
  'submit' => false,
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
@endphp

@if ($link)
  <a href="{{ $link }}" class="{{ $classes }}">
    {{ $slot }}
  </a>
@else
  <button type="{{ $submit ? 'submit' : 'button' }}" class="{{ $classes }}">
    {{ $slot }}
  </button>
@endif
