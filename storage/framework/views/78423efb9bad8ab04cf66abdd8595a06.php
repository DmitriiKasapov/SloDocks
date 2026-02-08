

<header class="header__index bg-white/80 backdrop-blur-md border-b border-indigo-100 sticky top-0 z-50" role="banner">
    <div class="container-grid">
        <div class="content flex justify-between items-center h-16">
            
            <div class="flex items-center">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-2" aria-label="SloDocs - Главная страница">
                    <div class="w-8 h-8 gradient-brand-icon rounded-lg flex items-center justify-center" aria-hidden="true">
                        <span class="text-white font-bold text-sm">SD</span>
                    </div>
                    <span class="text-xl font-bold gradient-text-gray">
                        SloDocs
                    </span>
                </a>
            </div>

            
            <?php if (isset($component)) { $__componentOriginal5d07ae629f5938ce59c77e5dcb7f224b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d07ae629f5938ce59c77e5dcb7f224b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header.navigation','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header.navigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5d07ae629f5938ce59c77e5dcb7f224b)): ?>
<?php $attributes = $__attributesOriginal5d07ae629f5938ce59c77e5dcb7f224b; ?>
<?php unset($__attributesOriginal5d07ae629f5938ce59c77e5dcb7f224b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d07ae629f5938ce59c77e5dcb7f224b)): ?>
<?php $component = $__componentOriginal5d07ae629f5938ce59c77e5dcb7f224b; ?>
<?php unset($__componentOriginal5d07ae629f5938ce59c77e5dcb7f224b); ?>
<?php endif; ?>
        </div>
    </div>
</header>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/header/index.blade.php ENDPATH**/ ?>