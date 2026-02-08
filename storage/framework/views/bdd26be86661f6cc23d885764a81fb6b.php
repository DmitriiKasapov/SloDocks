

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'title' => '',
  'highlight' => '',
  'subtitle' => '',
  'search' => true,
  'searchPlaceholder' => 'Поиск услуг...',
  'searchPlaceholderFull' => 'Что вы ищете? Например: вид на жительство, школа, налоги...',
  'searchHint' => '',
  'gradient' => 'blue',
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
  'title' => '',
  'highlight' => '',
  'subtitle' => '',
  'search' => true,
  'searchPlaceholder' => 'Поиск услуг...',
  'searchPlaceholderFull' => 'Что вы ищете? Например: вид на жительство, школа, налоги...',
  'searchHint' => '',
  'gradient' => 'blue',
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
  $gradientClasses = match($gradient) {
    'blue' => 'gradient-banner-primary',
    'purple' => 'gradient-banner-secondary',
    'green' => 'gradient-banner-tertiary',
    default => 'gradient-banner-primary',
  };
?>

<section class="banners__banner relative <?php echo e($gradientClasses); ?> overflow-hidden <?php echo e($class); ?>" aria-label="Главный баннер">
  <!-- Decorative pattern background -->
  <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAgMi4yMTItMS43OSA0LTQgNHMtNC0xLjc4OC00LTQgMS43OS00IDQtNCA0IDEuNzg4IDQgNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-40" aria-hidden="true"></div>

  <div class="relative container-grid py-20 md:py-28">
    <div class="content text-center max-w-4xl mx-auto">
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($title || $slot->isNotEmpty()): ?>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slot->isNotEmpty()): ?>
            <?php echo e($slot); ?>

          <?php else: ?>
            <?php echo e($title); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($highlight): ?>
              <br/>
              <span class="text-amber-300"><?php echo e($highlight); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </h1>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($subtitle): ?>
        <p class="text-xl md:text-2xl text-blue-100 mb-10 leading-relaxed">
          <?php echo e($subtitle); ?>

        </p>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search): ?>
        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto" x-data="{ isMobile: window.innerWidth < 640 }" x-init="window.addEventListener('resize', () => isMobile = window.innerWidth < 640)">
          <?php if (isset($component)) { $__componentOriginal933f42a71e38baa72f68c88c0100dc0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal933f42a71e38baa72f68c88c0100dc0d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.form-items.search-input','data' => ['xBind:placeholder' => 'isMobile ? \''.e($searchPlaceholder).'\' : \''.e($searchPlaceholderFull).'\'','class' => 'search-hero']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.form-items.search-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-bind:placeholder' => 'isMobile ? \''.e($searchPlaceholder).'\' : \''.e($searchPlaceholderFull).'\'','class' => 'search-hero']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php echo e($searchHint); ?>

           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal933f42a71e38baa72f68c88c0100dc0d)): ?>
<?php $attributes = $__attributesOriginal933f42a71e38baa72f68c88c0100dc0d; ?>
<?php unset($__attributesOriginal933f42a71e38baa72f68c88c0100dc0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal933f42a71e38baa72f68c88c0100dc0d)): ?>
<?php $component = $__componentOriginal933f42a71e38baa72f68c88c0100dc0d; ?>
<?php unset($__componentOriginal933f42a71e38baa72f68c88c0100dc0d); ?>
<?php endif; ?>
        </div>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
  </div>
</section>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/banners/index.blade.php ENDPATH**/ ?>