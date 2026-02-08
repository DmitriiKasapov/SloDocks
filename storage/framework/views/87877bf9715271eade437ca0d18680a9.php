

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'variant' => 'primary',
  'size' => 'lg',
  'href' => '',
  'submit' => false,
  'arrow' => '',
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
  'size' => 'lg',
  'href' => '',
  'submit' => false,
  'arrow' => '',
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

  // Arrow size depends on button size
  $arrowSize = match($size) {
    'sm' => 'w-4 h-4',
    'lg' => 'w-6 h-6',
    default => 'w-5 h-5',
  };

  // Arrow SVG - base arrow is left, right arrow is rotated 180deg
  $arrowLeft = '<svg class="' . $arrowSize . ' btn-arrow btn-arrow-left" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>';
  $arrowRight = '<svg class="' . $arrowSize . ' btn-arrow btn-arrow-right rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>';
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($href): ?>
  <a href="<?php echo e($href); ?>" class="elements__button__index <?php echo e($classes); ?>">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($arrow === 'left'): ?>
      <?php echo $arrowLeft; ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <span><?php echo e($slot); ?></span>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($arrow === 'right'): ?>
      <?php echo $arrowRight; ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
  </a>
<?php else: ?>
  <button type="<?php echo e($submit ? 'submit' : 'button'); ?>" class="elements__button__index <?php echo e($classes); ?>">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($arrow === 'left'): ?>
      <?php echo $arrowLeft; ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <span><?php echo e($slot); ?></span>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($arrow === 'right'): ?>
      <?php echo $arrowRight; ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
  </button>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/elements/button/index.blade.php ENDPATH**/ ?>