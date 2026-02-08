{{--
  Search Input Component

  Поисковый input с иконкой/кнопкой поиска в форме

  @param string $name - Имя поля (default: 'q')
  @param string $id - HTML id (optional, defaults to name)
  @param string $placeholder - Текст placeholder (optional)
  @param string $value - Значение поля (optional)
  @param string $hint - Текст подсказки под полем (optional)
  @param string $formAction - URL для отправки формы (default: route('search'))
  @param string $class - Дополнительные CSS классы (optional)
  @param bool $disabled - Заблокировано ли поле (default: false)

  Примеры:
  <x-elements.form-items.search-input placeholder="Поиск..." />
  <x-elements.form-items.search-input name="q" placeholder="Что вы ищете?" hint="Найдите нужную инструкцию" />
  <x-elements.form-items.search-input formAction="/custom-search" placeholder="Введите запрос" />
--}}

@props([
  'name' => 'q',
  'id' => '',
  'placeholder' => 'Поиск...',
  'value' => '',
  'hint' => '',
  'formAction' => '',
  'class' => '',
  'disabled' => false,
])

@php
  $inputId = $id ?: $name;
  $actionUrl = $formAction ?: route('search');
@endphp

<div class="elements__form-items__search-input search-input {{ $class }}">
  <form method="GET" action="{{ $actionUrl }}" role="search">
    <div class="relative">
      <input
        type="search"
        id="{{ $inputId }}"
        name="{{ $name }}"
        @if($value) value="{{ $value }}" @endif
        placeholder="{{ $placeholder }}"
        @if($disabled) disabled @endif
        aria-label="Поиск услуг"
        class="w-full pl-4 py-3 pr-15 rounded-xl border-2 border-gray-200 text-gray-900 placeholder-gray-500 text-lg bg-white shadow-md transition-all duration-200  disabled:bg-gray-100 disabled:cursor-not-allowed"
      >

      <button
        type="submit"
        @if($disabled) disabled @endif
        aria-label="Искать"
        class="absolute right-2 top-1/2 -translate-y-1/2 btn-primary p-3 rounded-lg disabled:opacity-50 disabled:cursor-not-allowed "
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
      </button>
    </div>
  </form>

  @if($hint || $slot->isNotEmpty())
    <p class="mt-3 text-sm text-gray-500">
      {{ $hint ?: $slot }}
    </p>
  @endif
</div>
