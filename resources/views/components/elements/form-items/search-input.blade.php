{{--
  Search Input Component

  Поисковый input с иконкой/кнопкой поиска

  @param string $name - Имя поля (required)
  @param string $id - HTML id (optional, defaults to name)
  @param string $placeholder - Текст placeholder (optional)
  @param string $value - Значение поля (optional)
  @param string $hint - Текст подсказки под полем (optional)
  @param string $action - Wire action для кнопки поиска (optional)
  @param string $class - Дополнительные CSS классы (optional)
  @param bool $disabled - Заблокировано ли поле (default: false)

  Примеры:
  <x-elements.form-items.search-input name="search" placeholder="Поиск..." />
  <x-elements.form-items.search-input name="q" placeholder="Что вы ищете?" hint="Найдите нужную инструкцию" />
  <x-elements.form-items.search-input name="search" action="search" placeholder="Введите запрос" />
--}}

@props([
  'name' => 'search',
  'id' => '',
  'placeholder' => 'Поиск...',
  'value' => '',
  'hint' => '',
  'action' => '',
  'class' => '',
  'disabled' => false,
])

@php
  $inputId = $id ?: $name;
@endphp

<div class="search-input {{ $class }}">
  <div class="relative">
    <input
      type="text"
      id="{{ $inputId }}"
      name="{{ $name }}"
      @if($value) value="{{ $value }}" @endif
      placeholder="{{ $placeholder }}"
      @if($disabled) disabled @endif
      class="w-full px-6 py-4 pr-14 rounded-xl border-2 border-gray-200 text-gray-900 placeholder-gray-500 text-lg bg-white shadow-md transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-amber-300 focus:border-amber-500 disabled:bg-gray-100 disabled:cursor-not-allowed"
      @if($action) wire:model="{{ $name }}" @endif
    >

    <button
      type="button"
      @if($action) wire:click="{{ $action }}" @endif
      @if($disabled) disabled @endif
      class="absolute right-2 top-1/2 -translate-y-1/2 btn-primary p-3 rounded-lg disabled:opacity-50 disabled:cursor-not-allowed"
    >
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
      </svg>
    </button>
  </div>

  @if($hint || $slot->isNotEmpty())
    <p class="mt-3 text-sm text-gray-500">
      {{ $hint ?: $slot }}
    </p>
  @endif
</div>
