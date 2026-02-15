

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'name',
  'options',
  'class' => '',
  'initval' => '',
  'buttonText' => '',
  'deselect' => false,
  'disabled' => false,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
  'name',
  'options',
  'class' => '',
  'initval' => '',
  'buttonText' => '',
  'deselect' => false,
  'disabled' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div
  class="<?php echo \Illuminate\Support\Arr::toCssClasses(['elements__form-items__select form-item select relative', $class]); ?>"
  x-data="{
    open: false,
    value: '<?php echo e($initval); ?>',
    label: '<?php echo e($initval && isset($options[$initval]) ? $options[$initval] : ''); ?>',
    placeholder: '<?php echo e($buttonText); ?>',
    deselect: <?php echo e($deselect ? 'true' : 'false'); ?>,
    disabled: <?php echo e($disabled ? 'true' : 'false'); ?>,
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
      this.$dispatch('change', { name: '<?php echo e($name); ?>', value: this.value });
    },
  }"
  x-on:keydown.escape.prevent="open = false"
  x-on:click.outside="open = false"
  :aria-expanded="open.toString()"
  <?php echo e($disabled ? 'data-disabled' : ''); ?>

>
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slot->isNotEmpty()): ?>
    <label for="<?php echo e($name); ?>" class="label black"><?php echo e($slot); ?></label>
  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

  <div class="relative">
    <button
      class="select-button flex items-center justify-between gap-1 w-full"
      type="button"
      role="combobox"
      :aria-expanded="open.toString()"
      aria-controls="<?php echo e($name); ?>"
      aria-haspopup="listbox"
      x-on:click="toggle()"
      :disabled="disabled"
    >
      <span class="selected-value" x-text="label || placeholder"><?php echo e($buttonText); ?></span>
      <svg class="w-4 h-4 text-gray-400 transition-transform duration-200 shrink-0" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
      </svg>
    </button>

    <ul
      class="absolute bg-white custom-scrollbar min-w-full"
      role="listbox"
      id="<?php echo e($name); ?>"
      x-show="open"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0 -translate-y-1"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-100"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 -translate-y-1"
      x-cloak
    >
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($deselect && $buttonText): ?>
        <li
          class="px-4 py-2.5"
          role="option"
          :aria-selected="(value === '').toString()"
          tabindex="0"
          x-on:click="value = ''; label = ''; open = false; $dispatch('change', { name: '<?php echo e($name); ?>', value: '' })"
          x-on:keydown.enter.prevent="value = ''; label = ''; open = false; $dispatch('change', { name: '<?php echo e($name); ?>', value: '' })"
          x-on:keydown.space.prevent="value = ''; label = ''; open = false; $dispatch('change', { name: '<?php echo e($name); ?>', value: '' })"
        >
          <span><?php echo e($buttonText); ?></span>
        </li>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <li
          class="px-4 py-2.5"
          role="option"
          :aria-selected="(value === '<?php echo e($key); ?>').toString()"
          tabindex="0"
          x-on:click="pick('<?php echo e($key); ?>', '<?php echo e($label); ?>')"
          x-on:keydown.enter.prevent="pick('<?php echo e($key); ?>', '<?php echo e($label); ?>')"
          x-on:keydown.space.prevent="pick('<?php echo e($key); ?>', '<?php echo e($label); ?>')"
        >
          <input type="radio" id="<?php echo e("$name-$loop->index"); ?>" name="<?php echo e($name); ?>" value="<?php echo e($key); ?>" class="visually-hidden" :checked="value === '<?php echo e($key); ?>'" />
          <label for="<?php echo e("$name-$loop->index"); ?>">
            <?php echo e($label); ?>

          </label>
        </li>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </ul>
  </div>
</div>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/elements/form-items/select.blade.php ENDPATH**/ ?>