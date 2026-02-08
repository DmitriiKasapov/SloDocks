

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['content']));

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

foreach (array_filter((['content']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $colors = [
        'info' => [
            'bg' => 'gradient-tip-info',
            'border' => 'border-blue-400',
            'icon_bg' => 'bg-blue-400',
            'text' => 'text-blue-800',
            'icon' => '💡',
        ],
        'warning' => [
            'bg' => 'gradient-tip-warning',
            'border' => 'border-amber-400',
            'icon_bg' => 'bg-amber-400',
            'text' => 'text-amber-800',
            'icon' => '⚠️',
        ],
        'success' => [
            'bg' => 'gradient-tip-success',
            'border' => 'border-emerald-500',
            'icon_bg' => 'bg-emerald-500',
            'text' => 'text-emerald-800',
            'icon' => '✅',
        ],
    ];

    $level = $content['level'] ?? 'info';
    $style = $colors[$level] ?? $colors['info'];
?>

<div class="material-blocks__tip <?php echo e($style['bg']); ?> border-l-4 <?php echo e($style['border']); ?> rounded-xl p-6 mb-8 shadow-sm">
    <div class="flex items-start gap-4">
        <div class="flex-shrink-0">
            <div class="w-10 h-10 <?php echo e($style['icon_bg']); ?> rounded-full flex items-center justify-center">
                <span class="text-xl"><?php echo e($style['icon']); ?></span>
            </div>
        </div>
        <div class="flex-grow <?php echo e($style['text']); ?> prose prose-sm max-w-none">
            <?php echo $content['text'] ?? ''; ?>

        </div>
    </div>
</div>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/material-blocks/tip.blade.php ENDPATH**/ ?>