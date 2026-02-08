

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'name' => 'q',
  'id' => '',
  'placeholder' => 'Поиск...',
  'value' => '',
  'hint' => '',
  'formAction' => '',
  'class' => '',
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
  'name' => 'q',
  'id' => '',
  'placeholder' => 'Поиск...',
  'value' => '',
  'hint' => '',
  'formAction' => '',
  'class' => '',
  'disabled' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
  $inputId = $id ?: $name;
  $actionUrl = $formAction ?: route('search');
?>

<div class="elements__form-items__search-input search-input <?php echo e($class); ?>">
  <form method="GET" action="<?php echo e($actionUrl); ?>" role="search">
    <div class="relative">
      <input
        type="search"
        id="<?php echo e($inputId); ?>"
        name="<?php echo e($name); ?>"
        <?php if($value): ?> value="<?php echo e($value); ?>" <?php endif; ?>
        placeholder="<?php echo e($placeholder); ?>"
        <?php if($disabled): ?> disabled <?php endif; ?>
        aria-label="Поиск услуг"
        class="w-full pl-4 py-3 pr-15 rounded-xl border-2 border-gray-200 text-gray-900 placeholder-gray-500 text-lg bg-white shadow-md transition-all duration-200  disabled:bg-gray-100 disabled:cursor-not-allowed"
      >

      <button
        type="submit"
        <?php if($disabled): ?> disabled <?php endif; ?>
        aria-label="Искать"
        class="absolute right-2 top-1/2 -translate-y-1/2 btn-primary p-3 rounded-lg disabled:opacity-50 disabled:cursor-not-allowed "
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
      </button>
    </div>
  </form>

  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hint || $slot->isNotEmpty()): ?>
    <p class="mt-3 text-sm text-gray-500">
      <?php echo e($hint ?: $slot); ?>

    </p>
  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/elements/form-items/search-input.blade.php ENDPATH**/ ?>