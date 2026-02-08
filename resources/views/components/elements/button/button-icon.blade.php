{{--
  elements__button__button-icon

  Кнопка со встроенной стрелкой вправо. Использует основной компонент button/index.

  @param string $variant - Вариант кнопки: 'primary' (default), 'secondary', 'ghost', 'link', 'danger'
  @param string $size - Размер: 'sm', '', 'lg'
  @param string $link - URL если кнопка - ссылка
  @param string $target - Атрибут target для ссылки
  @param string $action - Livewire action для wire:click
  @param bool $submit - Если true, type="submit"
  @param bool $disabled - Заблокирована ли кнопка
  @param string $id - HTML id атрибут
  @param string $class - Дополнительные CSS классы

  Примеры:
  <x-elements.button.button-icon>Перейти к материалам</x-elements.button.button-icon>
  <x-elements.button.button-icon variant="secondary" link="/services">Все услуги</x-elements.button.button-icon>
  <x-elements.button.button-icon variant="primary" size="lg">Купить доступ</x-elements.button.button-icon>
--}}

@props([
  'variant' => 'primary',
  'size' => '',
  'link' => '',
  'target' => '',
  'action' => '',
  'submit' => false,
  'disabled' => false,
  'id' => '',
  'class' => '',
])

<x-elements.button.index
  :variant="$variant"
  :size="$size"
  :link="$link"
  :target="$target"
  :action="$action"
  :submit="$submit"
  :disabled="$disabled"
  :id="$id"
  :class="$class"
>
  {{ $slot }}
  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
  </svg>
</x-elements.button.index>
