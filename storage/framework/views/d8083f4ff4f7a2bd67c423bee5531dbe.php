<?php $__env->startSection('title', 'SloDocs — Информация для иностранцев в Словении'); ?>
<?php $__env->startSection('meta_description', 'Инструкции и документы для самостоятельного оформления. Переезд, документы, жилье, работа, семья.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Banner -->
<?php if (isset($component)) { $__componentOriginalb369f480df938bcd4c6a6e032c6e21e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb369f480df938bcd4c6a6e032c6e21e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.banner','data' => ['title' => 'Всё для жизни в Словении','highlight' => 'на понятном языке','subtitle' => 'Пошаговые инструкции и готовые документы для самостоятельного оформления','searchPlaceholder' => 'Что вы ищете? Например: вид на жительство, школа, налоги...','searchHint' => 'Найдите нужную инструкцию среди ' . $services->count() . ' материалов']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blocks.banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Всё для жизни в Словении','highlight' => 'на понятном языке','subtitle' => 'Пошаговые инструкции и готовые документы для самостоятельного оформления','searchPlaceholder' => 'Что вы ищете? Например: вид на жительство, школа, налоги...','searchHint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Найдите нужную инструкцию среди ' . $services->count() . ' материалов')]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb369f480df938bcd4c6a6e032c6e21e1)): ?>
<?php $attributes = $__attributesOriginalb369f480df938bcd4c6a6e032c6e21e1; ?>
<?php unset($__attributesOriginalb369f480df938bcd4c6a6e032c6e21e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb369f480df938bcd4c6a6e032c6e21e1)): ?>
<?php $component = $__componentOriginalb369f480df938bcd4c6a6e032c6e21e1; ?>
<?php unset($__componentOriginalb369f480df938bcd4c6a6e032c6e21e1); ?>
<?php endif; ?>

<!-- Services by Category Section -->
<section id="services" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="mb-12 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Доступные материалы
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Выберите тему и получите пошаговую инструкцию с готовыми документами
        </p>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories->count() > 0): ?>
        <!-- Categories Grid: 2 columns on desktop, 1 on mobile -->
        <div class="grid md:grid-cols-2 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal30f28fac987be2021da0a7e82e35d24a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30f28fac987be2021da0a7e82e35d24a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.category-card','data' => ['title' => $category->name,'services' => $category->services,'icon' => $category->icon ?? '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blocks.category-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->name),'services' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->services),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->icon ?? '')]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal30f28fac987be2021da0a7e82e35d24a)): ?>
<?php $attributes = $__attributesOriginal30f28fac987be2021da0a7e82e35d24a; ?>
<?php unset($__attributesOriginal30f28fac987be2021da0a7e82e35d24a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30f28fac987be2021da0a7e82e35d24a)): ?>
<?php $component = $__componentOriginal30f28fac987be2021da0a7e82e35d24a; ?>
<?php unset($__componentOriginal30f28fac987be2021da0a7e82e35d24a); ?>
<?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-12 bg-white rounded-2xl shadow-sm">
            <div class="text-gray-400 mb-4">
                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <p class="text-gray-600 text-lg font-medium">Материалы скоро появятся</p>
            <p class="text-gray-500 text-sm mt-2">Мы работаем над наполнением базы</p>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>

<?php if (isset($component)) { $__componentOriginal018934ce6bfdd26263ae5e1d24f3f34b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal018934ce6bfdd26263ae5e1d24f3f34b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.features','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blocks.features'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal018934ce6bfdd26263ae5e1d24f3f34b)): ?>
<?php $attributes = $__attributesOriginal018934ce6bfdd26263ae5e1d24f3f34b; ?>
<?php unset($__attributesOriginal018934ce6bfdd26263ae5e1d24f3f34b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal018934ce6bfdd26263ae5e1d24f3f34b)): ?>
<?php $component = $__componentOriginal018934ce6bfdd26263ae5e1d24f3f34b; ?>
<?php unset($__componentOriginal018934ce6bfdd26263ae5e1d24f3f34b); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalc50b4a9c1edbb8214c3b20be826315d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc50b4a9c1edbb8214c3b20be826315d8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.seo-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blocks.seo-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc50b4a9c1edbb8214c3b20be826315d8)): ?>
<?php $attributes = $__attributesOriginalc50b4a9c1edbb8214c3b20be826315d8; ?>
<?php unset($__attributesOriginalc50b4a9c1edbb8214c3b20be826315d8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc50b4a9c1edbb8214c3b20be826315d8)): ?>
<?php $component = $__componentOriginalc50b4a9c1edbb8214c3b20be826315d8; ?>
<?php unset($__componentOriginalc50b4a9c1edbb8214c3b20be826315d8); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal322274d2d69814555f084d6e7eb2a4be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal322274d2d69814555f084d6e7eb2a4be = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.warning','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blocks.warning'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal322274d2d69814555f084d6e7eb2a4be)): ?>
<?php $attributes = $__attributesOriginal322274d2d69814555f084d6e7eb2a4be; ?>
<?php unset($__attributesOriginal322274d2d69814555f084d6e7eb2a4be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal322274d2d69814555f084d6e7eb2a4be)): ?>
<?php $component = $__componentOriginal322274d2d69814555f084d6e7eb2a4be; ?>
<?php unset($__componentOriginal322274d2d69814555f084d6e7eb2a4be); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\SloDoks\resources\views/pages/home.blade.php ENDPATH**/ ?>