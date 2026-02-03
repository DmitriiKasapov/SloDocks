

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'variant' => 'primary',
  'size' => '',
  'link' => '',
  'submit' => false,
  'class' => '',
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
  'variant' => 'primary',
  'size' => '',
  'link' => '',
  'submit' => false,
  'class' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
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
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($link): ?>
  <a href="<?php echo e($link); ?>" class="<?php echo e($classes); ?>">
    <?php echo e($slot); ?>

  </a>
<?php else: ?>
  <button type="<?php echo e($submit ? 'submit' : 'button'); ?>" class="<?php echo e($classes); ?>">
    <?php echo e($slot); ?>

  </button>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/elements/button/index.blade.php ENDPATH**/ ?>