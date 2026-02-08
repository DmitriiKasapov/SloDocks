@props([
  'class' => '',
  'name',
  'message' => '',
  'checked' => false,
  'round' => false,
  'disabled' => false])

<div class="elements__form-items__checkbox form-item checkbox relative {{ $class ?? '' }}">
  <label @class(['checkbox-input pl-[30px] flex gap-2'])>
    <input type="checkbox" class="visually-hidden"
      id="{{ $name }}"
      wire:model="{{ $name }}"
      {{ $checked ? 'checked' : '' }}
      {{ $disabled ? 'disabled' : '' }}
      {{ $errors->has($name) ?? '' ? 'describedby='. $name . '-error' : '' }}
      {{ $errors->has($name) ?? '' ? 'aria-invalid="true"' : '' }}
    >
    <!-- Check icon -->
    <div @class(['clip-path','rounded' => $round, $errors->has($name) ? '_danger' : ''])></div>

    <div class="checkbox-text cursor-pointer">
      {{ $slot }}
    </div>
  </label>
  @error ($name)
    <x-form-items.error-message :id="$name">
      {{ $message }}
    </x-form-items.error-message>
  @enderror
</div>
