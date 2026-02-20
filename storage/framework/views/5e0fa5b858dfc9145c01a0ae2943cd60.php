<?php extract((new \Illuminate\Support\Collection($attributes->getAttributes()))->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['content','block','service','access']));

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

foreach (array_filter((['content','block','service','access']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<?php if (isset($component)) { $__componentOriginal61d793e1f9eaad5c565d1e72f6d9a993 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal61d793e1f9eaad5c565d1e72f6d9a993 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.material-blocks.steps','data' => ['content' => $content,'block' => $block,'service' => $service,'access' => $access]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('material-blocks.steps'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($content),'block' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($block),'service' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($service),'access' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($access)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal61d793e1f9eaad5c565d1e72f6d9a993)): ?>
<?php $attributes = $__attributesOriginal61d793e1f9eaad5c565d1e72f6d9a993; ?>
<?php unset($__attributesOriginal61d793e1f9eaad5c565d1e72f6d9a993); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal61d793e1f9eaad5c565d1e72f6d9a993)): ?>
<?php $component = $__componentOriginal61d793e1f9eaad5c565d1e72f6d9a993; ?>
<?php unset($__componentOriginal61d793e1f9eaad5c565d1e72f6d9a993); ?>
<?php endif; ?><?php /**PATH D:\Projects\SloDoks\storage\framework\views/02262ed5272bbc2780ba74d102219249.blade.php ENDPATH**/ ?>