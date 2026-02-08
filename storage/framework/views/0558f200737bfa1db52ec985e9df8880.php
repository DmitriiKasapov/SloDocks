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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banners.second','data' => ['title' => ''.e($service->title).'','description' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('banners.second'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e($service->title).'','description' => '']); ?>
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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasAccess): ?>
    
    <section class="container-grid my-7.5 md:my-15">
        <div class="content">
            <div class="gradient-tip-success rounded-2xl p-6 md:p-8 border-2 border-emerald-200 shadow-sm">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0">
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
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

<!-- What's Included -->
<section class="container-grid my-7.5 md:my-15">
    <div class="content">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Что входит в материалы</h2>
        <div class="grid sm:grid-cols-2 gap-4">
            <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0 w-10 h-10 gradient-icon-emerald rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Пошаговая инструкция</h3>
                    <p class="text-gray-600 text-sm">Детальное руководство по каждому этапу процесса</p>
                </div>
            </div>

            <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0 w-10 h-10 gradient-icon-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Список документов</h3>
                    <p class="text-gray-600 text-sm">Полный перечень необходимых документов с пояснениями</p>
                </div>
            </div>

            <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0 w-10 h-10 gradient-icon-violet rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Заполненные образцы</h3>
                    <p class="text-gray-600 text-sm">Примеры правильно заполненных заявлений и форм</p>
                </div>
            </div>

            <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0 w-10 h-10 gradient-icon-pink rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Практические советы</h3>
                    <p class="text-gray-600 text-sm">Рекомендации из реального опыта и важные нюансы</p>
                </div>
            </div>
        </div>
    </div>
</section>

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