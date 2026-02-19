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
        <section class="container-grid my-10 md:my-20">
            <div class="content">
                <div class="wysiwyg text-base">
                    <?php echo $service->intro_text; ?>

                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <section class="container-grid my-10 md:my-20">
        <div class="content">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasAccess): ?>
                <?php
                    $daysRemaining = $access->daysRemaining();
                    $timeMessage = $access->getTimeRemainingMessage();
                    $borderColor = $daysRemaining <= 3 ? 'border-red-300' : ($daysRemaining <= 7 ? 'border-amber-300' : 'border-emerald-300');
                    $badgeBg = $daysRemaining <= 3 ? 'bg-red-100 text-red-800' : ($daysRemaining <= 7 ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800');
                    $sideBg = $daysRemaining <= 3 ? 'bg-red-50' : ($daysRemaining <= 7 ? 'bg-amber-50' : 'bg-emerald-50');
                    $sideBorder = $daysRemaining <= 3 ? 'border-red-300' : ($daysRemaining <= 7 ? 'border-amber-300' : 'border-emerald-300');
                ?>
                <div class="bg-white rounded-2xl border-2 <?php echo e($borderColor); ?> shadow-lg overflow-hidden">
                    <div class="flex flex-col lg:flex-row">
                        
                        <div class="flex-1 p-6 md:p-8">
                            <div class="inline-flex items-center px-3 py-1 <?php echo e($badgeBg); ?> text-xs font-bold uppercase tracking-wide rounded-full mb-4">
                                Доступ открыт
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo e($service->title); ?></h3>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->description_public): ?>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    <?php echo e($service->description_public); ?>

                                </p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="mt-4 flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span><?php echo e($timeMessage); ?></span>
                            </div>
                        </div>
                        
                        <div class="lg:w-56 p-6 md:p-8 <?php echo e($sideBg); ?> border-t-2 lg:border-t-0 lg:border-l-2 <?php echo e($sideBorder); ?> flex flex-col items-center justify-center gap-4">
                            <div class="text-center">
                                <div class="text-sm text-gray-500">Доступ до</div>
                                <div class="text-lg font-bold text-gray-900 mt-1">
                                    <?php echo e($access->expires_at->format('d.m.Y')); ?>

                                </div>
                            </div>
                            <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['href' => ''.e(route('services.content', $service->slug)).'?token='.e($access->access_token).'','class' => 'w-full justify-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('services.content', $service->slug)).'?token='.e($access->access_token).'','class' => 'w-full justify-center']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                Читать
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
            <?php else: ?>
                <div class="gradient-brand-lightest rounded-2xl border-2 border-amber-200 shadow-lg overflow-hidden">
                    <div class="flex flex-col lg:flex-row">
                        
                        <div class="flex-1 p-6 md:p-8">
                            <div class="inline-flex items-center px-3 py-1 bg-amber-200 text-amber-900 text-xs font-bold uppercase tracking-wide rounded-full mb-4">
                                Получите доступ к материалам
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo e($service->title); ?></h3>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->description_public): ?>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    <?php echo e($service->description_public); ?>

                                </p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="mt-4 flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Доступ на <?php echo e($service->access_duration_days); ?> дней</span>
                            </div>
                        </div>
                        
                        <div class="lg:w-56 p-6 md:p-8 gradient-bg-gray-light border-t-2 lg:border-t-0 lg:border-l-2 border-amber-200 flex flex-col items-center justify-center gap-4">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-gray-900">
                                    €<?php echo e(number_format($service->price / 100, 0)); ?>

                                </div>
                                <div class="text-sm text-gray-500 mt-1">однократная оплата</div>
                            </div>
                            <form action="<?php echo e(route('payment.create')); ?>" method="POST" class="w-full">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="service_id" value="<?php echo e($service->id); ?>">
                                <?php if (isset($component)) { $__componentOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldcb3663c16b8b77a072c1ccc9d7eb8ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.elements.button.index','data' => ['submit' => 'true','class' => 'w-full justify-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('elements.button.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['submit' => 'true','class' => 'w-full justify-center']); ?>
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
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

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