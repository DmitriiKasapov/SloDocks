

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['content', 'class' => '']));

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

foreach (array_filter((['content', 'class' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
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
        ],
        'warning' => [
            'bg' => 'gradient-tip-warning',
            'border' => 'border-amber-400',
            'icon_bg' => 'bg-amber-400',
            'text' => 'text-amber-800',
        ],
        'success' => [
            'bg' => 'gradient-tip-success',
            'border' => 'border-emerald-500',
            'icon_bg' => 'bg-emerald-500',
            'text' => 'text-emerald-800',
        ],
    ];

    $level = $content['level'] ?? 'info';
    $style = $colors[$level] ?? $colors['info'];
?>

<section class="container-grid my-7.5 md:my-15 <?php echo e($class); ?>">
    <div class="content">
        <div class="<?php echo e($style['bg']); ?> border-l-4 <?php echo e($style['border']); ?> rounded-xl p-6 shadow-sm">
            <div class="flex items-start gap-4">
                <div class="shrink-0">
                    <div class="w-10 h-10 <?php echo e($style['icon_bg']); ?> rounded-full flex items-center justify-center">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($level === 'info'): ?>
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"/>
                            </svg>
                        <?php elseif($level === 'warning'): ?>
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        <?php elseif($level === 'success'): ?>
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <div class="flex-grow <?php echo e($style['text']); ?> wysiwyg text-base">
                    <?php echo $content['text'] ?? ''; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/material-blocks/tip.blade.php ENDPATH**/ ?>