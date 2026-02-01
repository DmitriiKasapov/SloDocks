{{--
  Link with Arrow Icon

  Текстовая ссылка с иконкой стрелки вправо

  @param string $link - URL ссылки (default: '#')
  @param string $target - Атрибут target (_blank, _self и т.д.)
  @param string $color - Цвет ссылки: 'amber' (default), 'orange', 'blue', 'gray'
  @param string $class - Дополнительные CSS классы

  Примеры:
  <x-elements.button.link link="/">Вернуться на главную</x-elements.button.link>
  <x-elements.button.link link="/about" color="blue">Узнать больше</x-elements.button.link>
  <x-elements.button.link link="https://example.com" target="_blank" color="orange">Внешняя ссылка</x-elements.button.link>
--}}

@props([
  'link' => '#',
  'target' => '',
  'color' => 'amber',
  'class' => '',
])

@php
  $colorClasses = match($color) {
    'amber' => 'text-amber-600 hover:text-amber-700',
    'orange' => 'text-orange-600 hover:text-orange-700',
    'blue' => 'text-blue-600 hover:text-blue-700',
    'gray' => 'text-gray-600 hover:text-gray-700',
    default => 'text-amber-600 hover:text-amber-700',
  };
@endphp

<a
  href="{{ $link }}"
  @if($target) target="{{ $target }}" @endif
  class="inline-flex items-center gap-2 font-inter font-semibold transition-colors {{ $colorClasses }} {{ $class }}"
>
  {{ $slot }}
  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
  </svg>
</a>
