

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['access']));

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

foreach (array_filter((['access']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $daysRemaining = $access->daysRemaining();
    $isExpiringSoon = $access->isExpiringSoon();
    $message = $access->getTimeRemainingMessage();

    // Determine color scheme based on days remaining
    if ($daysRemaining <= 3) {
        $bgColor = 'bg-red-50';
        $borderColor = 'border-red-200';
        $textColor = 'text-red-800';
        $iconColor = 'text-red-600';
    } elseif ($isExpiringSoon) {
        $bgColor = 'bg-amber-50';
        $borderColor = 'border-amber-200';
        $textColor = 'text-amber-800';
        $iconColor = 'text-amber-600';
    } else {
        $bgColor = 'bg-green-50';
        $borderColor = 'border-green-200';
        $textColor = 'text-green-800';
        $iconColor = 'text-green-600';
    }
?>

<div class="<?php echo e($bgColor); ?> <?php echo e($borderColor); ?> border rounded-xl p-4">
    <div class="flex items-start gap-3">
        <div class="flex-shrink-0">
            <svg class="w-5 h-5 <?php echo e($iconColor); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="flex-grow">
            <p class="text-sm font-medium <?php echo e($textColor); ?>">
                <?php echo e($message); ?>

            </p>
            <p class="text-xs <?php echo e($textColor); ?> opacity-75 mt-1">
                Доступ до <?php echo e($access->expires_at->format('d.m.Y в H:i')); ?>

            </p>
        </div>
    </div>
</div>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/access-timer.blade.php ENDPATH**/ ?>