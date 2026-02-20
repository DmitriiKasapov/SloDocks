@props(['options', 'name'])

<div class="elements__form-items__radio-group radio-group">
  @foreach ($options as $option)
      <x-elements.form-items.radio
        :name="$name"
        :id="$name.'-'.$loop->index"
        :value="$options['value']"
      >
        {{ $option['label'] }}
      </x-elements.form-items.radio>
  @endforeach
</div>