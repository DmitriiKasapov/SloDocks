<?php $__env->startSection('title', 'SloDocs — Информация для иностранцев в Словении'); ?>
<?php $__env->startSection('meta_description', 'Инструкции и документы для самостоятельного оформления. Переезд, документы, жилье, работа, семья.'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Banner -->
    <?php if (isset($component)) { $__componentOriginalc32e6698e82bf20a3ba861fefd05818f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc32e6698e82bf20a3ba861fefd05818f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banners.index','data' => ['title' => 'Всё для жизни в Словении','highlight' => 'на понятном языке','subtitle' => 'Пошаговые инструкции и готовые документы для самостоятельного оформления','searchPlaceholder' => 'Что вы ищете? Например: вид на жительство, школа, налоги...','searchHint' => 'Найдите нужную инструкцию среди ' . $services->count() . ' материалов']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('banners'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Всё для жизни в Словении','highlight' => 'на понятном языке','subtitle' => 'Пошаговые инструкции и готовые документы для самостоятельного оформления','searchPlaceholder' => 'Что вы ищете? Например: вид на жительство, школа, налоги...','searchHint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Найдите нужную инструкцию среди ' . $services->count() . ' материалов')]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc32e6698e82bf20a3ba861fefd05818f)): ?>
<?php $attributes = $__attributesOriginalc32e6698e82bf20a3ba861fefd05818f; ?>
<?php unset($__attributesOriginalc32e6698e82bf20a3ba861fefd05818f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc32e6698e82bf20a3ba861fefd05818f)): ?>
<?php $component = $__componentOriginalc32e6698e82bf20a3ba861fefd05818f; ?>
<?php unset($__componentOriginalc32e6698e82bf20a3ba861fefd05818f); ?>
<?php endif; ?>

    <!-- Services Catalog Section -->
    <section id="services" class="container-grid my-10 md:my-20">
        <div class="content" x-data="{ category: '' }" x-on:change="if ($event.detail && $event.detail.name === 'category') category = $event.detail.value">
            <div class="mb-10 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Материалы и инструкции
                </h2>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($services->count() > 0): ?>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($categoryOptions) > 1): ?>
                    <div class="mb-8">
                        <?php if (isset($component)) { $__componentOriginal293b887e98d4efd01c20292685a44750 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal293b887e98d4efd01c20292685a44750 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.form-items.select','data' => ['name' => 'category','options' => $categoryOptions,'buttonText' => 'Все категории','deselect' => true,'class' => 'w-full sm:w-72']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.form-items.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'category','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categoryOptions),'buttonText' => 'Все категории','deselect' => true,'class' => 'w-full sm:w-72']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal293b887e98d4efd01c20292685a44750)): ?>
<?php $attributes = $__attributesOriginal293b887e98d4efd01c20292685a44750; ?>
<?php unset($__attributesOriginal293b887e98d4efd01c20292685a44750); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal293b887e98d4efd01c20292685a44750)): ?>
<?php $component = $__componentOriginal293b887e98d4efd01c20292685a44750; ?>
<?php unset($__componentOriginal293b887e98d4efd01c20292685a44750); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc27bc1517659ca683b4c5e20506d0d80 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc27bc1517659ca683b4c5e20506d0d80 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.service','data' => ['service' => $service,'xShow' => '!category || category == \''.e($service->category_id).'\'','xTransition.opacity.duration.200ms' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cards.service'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['service' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($service),'x-show' => '!category || category == \''.e($service->category_id).'\'','x-transition.opacity.duration.200ms' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc27bc1517659ca683b4c5e20506d0d80)): ?>
<?php $attributes = $__attributesOriginalc27bc1517659ca683b4c5e20506d0d80; ?>
<?php unset($__attributesOriginalc27bc1517659ca683b4c5e20506d0d80); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc27bc1517659ca683b4c5e20506d0d80)): ?>
<?php $component = $__componentOriginalc27bc1517659ca683b4c5e20506d0d80; ?>
<?php unset($__componentOriginalc27bc1517659ca683b4c5e20506d0d80); ?>
<?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                
                <div
                    class="text-center py-12"
                    x-show="category && !document.querySelector('[data-category=\'' + category + '\']')"
                    x-cloak
                >
                    <p class="text-gray-500 text-lg">В этой категории пока нет материалов</p>
                </div>
            <?php else: ?>
                <div class="text-center py-12 bg-white rounded-2xl shadow-sm">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-lg font-medium">Материалы скоро появятся</p>
                    <p class="text-gray-500 text-sm mt-2">Мы работаем над наполнением базы</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
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