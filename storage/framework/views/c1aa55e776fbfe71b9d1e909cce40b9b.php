<?php $__env->startSection('title', 'Компоненты кнопок — SloDocs'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h1 class="text-4xl font-bold text-gray-900 mb-4 text-center">
        Компоненты кнопок
    </h1>
    <p class="text-lg text-gray-600 text-center mb-12 max-w-2xl mx-auto">
        Универсальный компонент <code class="bg-gray-100 px-2 py-1 rounded text-sm">x-elements.button.index</code>
    </p>

    <section class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
        
        <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Primary кнопки</h3>
            <div class="flex flex-wrap gap-4">
                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['arrow' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['arrow' => 'right']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Перейти к материалам
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $attributes = $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $component = $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Получить доступ
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $attributes = $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $component = $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['href' => ''.e(route('home')).'','arrow' => 'left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('home')).'','arrow' => 'left']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    На главную
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $attributes = $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $component = $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>
            </div>
        </div>

        
        <div class="mb-8 pt-8 border-t border-gray-200">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Secondary кнопки</h3>
            <div class="flex flex-wrap gap-4">
                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','arrow' => 'left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','arrow' => 'left']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Отменить
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $attributes = $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $component = $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Закрыть
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $attributes = $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $component = $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','arrow' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','arrow' => 'right']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Дополнительно
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $attributes = $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee)): ?>
<?php $component = $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee; ?>
<?php unset($__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee); ?>
<?php endif; ?>
            </div>
        </div>

        
        <div class="pt-8 border-t border-gray-200">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Примеры использования</h3>
            <div class="bg-gray-900 text-gray-100 rounded-lg p-6 text-sm font-mono">
                <div class="space-y-4">
                    <div>
                        <div class="text-gray-500">// Primary button with arrow right (size="lg" is default)</div>
                        <div>&lt;x-elements.button.index arrow="right"&gt;</div>
                        <div class="ml-4">Перейти к материалам</div>
                        <div>&lt;/x-elements.button.index&gt;</div>
                    </div>
                    <div>
                        <div class="text-gray-500">// Primary button without arrow</div>
                        <div>&lt;x-elements.button.index&gt;</div>
                        <div class="ml-4">Получить доступ</div>
                        <div>&lt;/x-elements.button.index&gt;</div>
                    </div>
                    <div>
                        <div class="text-gray-500">// Primary link with arrow left</div>
                        <div>&lt;x-elements.button.index href="/" arrow="left"&gt;</div>
                        <div class="ml-4">На главную</div>
                        <div>&lt;/x-elements.button.index&gt;</div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-700">
                        <div class="text-gray-500">// Secondary button</div>
                        <div>&lt;x-elements.button.index variant="secondary"&gt;</div>
                        <div class="ml-4">Отменить</div>
                        <div>&lt;/x-elements.button.index&gt;</div>
                    </div>
                    <div>
                        <div class="text-gray-500">// Secondary button with arrow</div>
                        <div>&lt;x-elements.button.index variant="secondary" arrow="left"&gt;</div>
                        <div class="ml-4">Назад</div>
                        <div>&lt;/x-elements.button.index&gt;</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\SloDoks\resources\views/pages/test.blade.php ENDPATH**/ ?>