<?php $__env->startSection('title', $service->seo_title ?? $service->title); ?>
<?php $__env->startSection('meta_description', $service->seo_description ?? $service->description_public); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal769db0fcc5d885d6f967832f663df33b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal769db0fcc5d885d6f967832f663df33b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.breadcrumbs','data' => ['items' => [
            ['label' => 'Главная', 'url' => route('home')],
            ['label' => $service->title],
        ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blocks.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
            ['label' => 'Главная', 'url' => route('home')],
            ['label' => $service->title],
        ])]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal769db0fcc5d885d6f967832f663df33b)): ?>
<?php $attributes = $__attributesOriginal769db0fcc5d885d6f967832f663df33b; ?>
<?php unset($__attributesOriginal769db0fcc5d885d6f967832f663df33b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal769db0fcc5d885d6f967832f663df33b)): ?>
<?php $component = $__componentOriginal769db0fcc5d885d6f967832f663df33b; ?>
<?php unset($__componentOriginal769db0fcc5d885d6f967832f663df33b); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal15ced5233cf101022e65b7aa5906629f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal15ced5233cf101022e65b7aa5906629f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banners.second','data' => ['title' => ''.e($service->title).'','description' => ''.e($service->description_public ?? '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('banners.second'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e($service->title).'','description' => ''.e($service->description_public ?? '').'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal15ced5233cf101022e65b7aa5906629f)): ?>
<?php $attributes = $__attributesOriginal15ced5233cf101022e65b7aa5906629f; ?>
<?php unset($__attributesOriginal15ced5233cf101022e65b7aa5906629f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15ced5233cf101022e65b7aa5906629f)): ?>
<?php $component = $__componentOriginal15ced5233cf101022e65b7aa5906629f; ?>
<?php unset($__componentOriginal15ced5233cf101022e65b7aa5906629f); ?>
<?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->intro_text): ?>
        <section class="container-grid my-7.5 md:my-15">
            <div class="content">
                <div class="wysiwyg text-base">
                    <?php echo $service->intro_text; ?>

                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasAccess): ?>
        
        <section class="container-grid my-7.5 md:my-15">
            <div class="content">
                <div class="gradient-tip-success rounded-2xl p-6 md:p-8 border-2 border-emerald-200 shadow-sm">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0" aria-hidden="true">
                                <div class="w-14 h-14 bg-emerald-500 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-1">Доступ открыт</h3>
                                <p class="text-gray-700">
                                    Вы можете перейти к материалам
                                </p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 flex flex-col sm:flex-row gap-3 items-center">
                            
                            <form action="<?php echo e(route('services.revoke-temp-access', $service->slug)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button
                                    type="submit"
                                    class="text-sm text-gray-600 hover:text-red-600 transition-colors flex items-center gap-2 whitespace-nowrap"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Закрыть доступ (тест)
                                </button>
                            </form>
                            <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['href' => ''.e(route('services.content', $service->slug)).'','arrow' => 'right','class' => 'w-full sm:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('services.content', $service->slug)).'','arrow' => 'right','class' => 'w-full sm:w-auto']); ?>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        
        <section class="container-grid my-7.5 md:my-15">
            <div class="content">
                <div class="gradient-brand-lightest rounded-2xl p-6 md:p-8 border-2 border-amber-200 shadow-lg">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="flex-grow">
                            <div class="inline-flex items-center px-3 py-1 bg-amber-200 text-amber-900 text-xs font-bold uppercase tracking-wide rounded-full mb-3">
                                Получите доступ к материалам
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Полная инструкция и документы</h3>
                            <p class="text-gray-700">
                                Пошаговое руководство, образцы документов и практические советы
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <form action="<?php echo e(route('services.grant-temp-access', $service->slug)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['submit' => 'true','arrow' => 'right','class' => 'w-full lg:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['submit' => 'true','arrow' => 'right','class' => 'w-full lg:w-auto']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                    Получить
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal7024a42c1d284199997b411c505155e6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7024a42c1d284199997b411c505155e6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.materials-included','data' => ['service' => $service]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blocks.materials-included'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['service' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($service)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7024a42c1d284199997b411c505155e6)): ?>
<?php $attributes = $__attributesOriginal7024a42c1d284199997b411c505155e6; ?>
<?php unset($__attributesOriginal7024a42c1d284199997b411c505155e6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7024a42c1d284199997b411c505155e6)): ?>
<?php $component = $__componentOriginal7024a42c1d284199997b411c505155e6; ?>
<?php unset($__componentOriginal7024a42c1d284199997b411c505155e6); ?>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\SloDoks\resources\views/pages/services/show.blade.php ENDPATH**/ ?>