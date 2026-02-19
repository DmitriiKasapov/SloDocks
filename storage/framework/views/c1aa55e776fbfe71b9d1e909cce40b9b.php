<?php $__env->startSection('title', 'UI Kit — Кнопки'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-grid py-16">
    <div class="content">
        <h1 class="text-4xl font-bold text-gray-900 mb-4 text-center">
            UI Kit — Кнопки
        </h1>
        <p class="text-lg text-gray-600 text-center mb-12 max-w-2xl mx-auto">
            Все варианты компонента <code class="text-sm bg-gray-100 px-2 py-1 rounded">x-elements.button.index</code>
        </p>
    </div>
</div>


<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Primary (variant="primary")</h2>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: lg (default)</h3>
            <div class="flex flex-wrap items-center gap-4">
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

                    Купить
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['arrow' => 'left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['arrow' => 'left']); ?>
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

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: sm</h3>
            <div class="flex flex-wrap items-center gap-4">
                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['size' => 'sm','arrow' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','arrow' => 'right']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Далее
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['size' => 'sm','arrow' => 'left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','arrow' => 'left']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Назад
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

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: default (без указания)</h3>
            <div class="flex flex-wrap items-center gap-4">
                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['size' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Отправить
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['size' => '','arrow' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => '','arrow' => 'right']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Продолжить
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
    </div>
</section>


<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Secondary (variant="secondary")</h2>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: lg (default)</h3>
            <div class="flex flex-wrap items-center gap-4">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','arrow' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','arrow' => 'right']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Подробнее
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','arrow' => 'left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','arrow' => 'left']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Вернуться
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

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: sm</h3>
            <div class="flex flex-wrap items-center gap-4">
                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','size' => 'sm']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','size' => 'sm','arrow' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','size' => 'sm','arrow' => 'right']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Далее
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','size' => 'sm','arrow' => 'left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','size' => 'sm','arrow' => 'left']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Назад
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
    </div>
</section>


<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Ссылки (href="...")</h2>
        <p class="text-gray-600">Рендерятся как <code class="text-sm bg-gray-100 px-2 py-1 rounded">&lt;a&gt;</code> вместо <code class="text-sm bg-gray-100 px-2 py-1 rounded">&lt;button&gt;</code></p>

        <div class="flex flex-wrap items-center gap-4">
            <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['href' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                Primary ссылка
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['href' => '#','arrow' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#','arrow' => 'right']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                Перейти
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','href' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','href' => '#']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                Secondary ссылка
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','href' => '#','arrow' => 'left']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','href' => '#','arrow' => 'left']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                Назад
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
</section>


<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Submit (submit="true")</h2>
        <p class="text-gray-600">Рендерятся как <code class="text-sm bg-gray-100 px-2 py-1 rounded">&lt;button type="submit"&gt;</code></p>

        <div class="flex flex-wrap items-center gap-4">
            <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['submit' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['submit' => 'true']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                Отправить
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['submit' => 'true','arrow' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['submit' => 'true','arrow' => 'right']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                Купить
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','submit' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','submit' => 'true']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                Сохранить черновик
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
</section>


<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Uppercase без стрелок</h2>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Primary</h3>
            <div class="flex flex-wrap items-center gap-4">
                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['class' => 'uppercase font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'uppercase font-bold']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Купить
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['class' => 'uppercase font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'uppercase font-bold']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['class' => 'uppercase font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'uppercase font-bold']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Отправить
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['size' => 'sm','class' => 'uppercase font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','class' => 'uppercase font-bold']); ?>
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
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Secondary</h3>
            <div class="flex flex-wrap items-center gap-4">
                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','class' => 'uppercase font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','class' => 'uppercase font-bold']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','class' => 'uppercase font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','class' => 'uppercase font-bold']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Подробнее
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','size' => 'sm','class' => 'uppercase font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','size' => 'sm','class' => 'uppercase font-bold']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Назад
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
    </div>
</section>


<section class="gradient-bg-gray-dark my-10 md:my-20">
    <div class="container-grid py-10 md:py-16">
        <div class="content space-y-8">
            <h2 class="text-2xl font-bold text-white">На тёмном фоне</h2>

            <div class="flex flex-wrap items-center gap-4">
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

                    Primary
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

                    Secondary
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Small primary
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['variant' => 'secondary','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'secondary','size' => 'sm']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Small secondary
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
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\SloDoks\resources\views/pages/test.blade.php ENDPATH**/ ?>