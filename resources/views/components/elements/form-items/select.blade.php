{{-- elements__form-items__select
  Custom select built on Alpine.js.

  Dispatches a native CustomEvent 'change' with { detail: { name, value } }
  on every selection so parent x-data or vanilla JS can listen.

  @param string  $name       — input name (required)
  @param array   $options    — key => label pairs (required)
  @param string  $initval    — pre-selected value
  @param string  $buttonText — placeholder when nothing is selected
  @param bool    $deselect   — allow toggling selection off
  @param string  $class      — extra CSS classes on the wrapper
  @param bool    $disabled   — disable the control
--}}

@props([
  'name',
  'options',
  'class' => '',
  'initval' => '',
  'buttonText' => '',
  'deselect' => false,
  'disabled' => false,
])

<div
  @class(['elements__form-items__select form-item select relative', $class])
  x-data="{
    open: false,
    value: '{{ $initval }}',
    label: '{{ $initval && isset($options[$initval]) ? $options[$initval] : '' }}',
    placeholder: '{{ $buttonText }}',
    deselect: {{ $deselect ? 'true' : 'false' }},
    disabled: {{ $disabled ? 'true' : 'false' }},
    toggle() {
      if (this.disabled) return;
      this.open = !this.open;
    },
    pick(val, lbl) {
      if (this.deselect && this.value === val) {
        this.value = '';
        this.label = '';
      } else {
        this.value = val;
        this.label = lbl;
      }
      this.open = false;
      this.$dispatch('change', { name: '{{ $name }}', value: this.value });
    },
  }"
  x-on:keydown.escape.prevent="open = false"
  x-on:click.outside="open = false"
  :aria-expanded="open.toString()"
  {{ $disabled ? 'data-disabled' : '' }}
>
  @if ($slot->isNotEmpty())
    <label for="{{ $name }}" class="label black">{{ $slot }}</label>
  @endif

  <div class="relative">
    <button
      class="select-button flex items-center justify-between gap-1 w-full"
      type="button"
      role="combobox"
      :aria-expanded="open.toString()"
      aria-controls="{{ $name }}"
      aria-haspopup="listbox"
      x-on:click="toggle()"
      :disabled="disabled"
    >
      <span class="selected-value" x-text="label || placeholder">{{ $buttonText }}</span>
      <svg class="w-4 h-4 text-gray-400 transition-transform duration-200 shrink-0" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
      </svg>
    </button>

    <ul
      class="absolute bg-white custom-scrollbar min-w-full"
      role="listbox"
      id="{{ $name }}"
      x-show="open"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0 -translate-y-1"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-100"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 -translate-y-1"
      x-cloak
    >
      @if($deselect && $buttonText)
        <li
          class="px-4 py-2.5"
          role="option"
          :aria-selected="(value === '').toString()"
          tabindex="0"
          x-on:click="value = ''; label = ''; open = false; $dispatch('change', { name: '{{ $name }}', value: '' })"
          x-on:keydown.enter.prevent="value = ''; label = ''; open = false; $dispatch('change', { name: '{{ $name }}', value: '' })"
          x-on:keydown.space.prevent="value = ''; label = ''; open = false; $dispatch('change', { name: '{{ $name }}', value: '' })"
        >
          <span>{{ $buttonText }}</span>
        </li>
      @endif
      @foreach ($options as $key => $label)
        <li
          class="px-4 py-2.5"
          role="option"
          :aria-selected="(value === '{{ $key }}').toString()"
          tabindex="0"
          x-on:click="pick('{{ $key }}', '{{ $label }}')"
          x-on:keydown.enter.prevent="pick('{{ $key }}', '{{ $label }}')"
          x-on:keydown.space.prevent="pick('{{ $key }}', '{{ $label }}')"
        >
          <input type="radio" id="{{ "$name-$loop->index" }}" name="{{ $name }}" value="{{ $key }}" class="visually-hidden" :checked="value === '{{ $key }}'" />
          <label for="{{ "$name-$loop->index" }}">
            {{ $label }}
          </label>
        </li>
      @endforeach
    </ul>
  </div>
</div>
