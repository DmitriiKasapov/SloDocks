<?php $__env->startSection('title', $service->title . ' - Материалы'); ?>
<?php $__env->startSection('meta_description', 'Материалы к услуге: ' . $service->title); ?>

<?php $__env->startPush('head'); ?>
    <!-- Prevent indexing of content pages -->
    <meta name="robots" content="noindex, nofollow">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal769db0fcc5d885d6f967832f663df33b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal769db0fcc5d885d6f967832f663df33b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.breadcrumbs','data' => ['items' => [
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => $service->title, 'url' => route('services.show', $service->slug)],
    ['label' => 'Материалы'],
],'class' => 'mt-6 mb-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blocks.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => $service->title, 'url' => route('services.show', $service->slug)],
    ['label' => 'Материалы'],
]),'class' => 'mt-6 mb-2']); ?>
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

<!-- Access Timer -->
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($access)): ?>
    <?php if (isset($component)) { $__componentOriginalfe6336c0756ae95b14af2476b2df24d5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfe6336c0756ae95b14af2476b2df24d5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.access-timer','data' => ['access' => $access]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('access-timer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['access' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($access)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfe6336c0756ae95b14af2476b2df24d5)): ?>
<?php $attributes = $__attributesOriginalfe6336c0756ae95b14af2476b2df24d5; ?>
<?php unset($__attributesOriginalfe6336c0756ae95b14af2476b2df24d5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfe6336c0756ae95b14af2476b2df24d5)): ?>
<?php $component = $__componentOriginalfe6336c0756ae95b14af2476b2df24d5; ?>
<?php unset($__componentOriginalfe6336c0756ae95b14af2476b2df24d5); ?>
<?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>





<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($service->intro_blocks)): ?>
    <div class="container-grid my-10 md:my-20">
        <div class="content flex flex-col gap-7.5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $service->intro_blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php
                    $blockType = $block['type'] ?? null;
                    $blockContent = $block['data'] ?? [];

                    // Skip if no valid type
                    if (!$blockType) continue;

                    $componentName = 'material-blocks.' . str_replace('_', '-', $blockType);
                ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(view()->exists("components.{$componentName}")): ?>
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $componentName] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['content' => $blockContent]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<!-- Content Blocks -->
<?php
    // Collect all steps blocks for auto-generated process overview
    $stepsBlocks = $service->contentBlocks->filter(function($block) {
        return $block->type === 'steps';
    });

    // Flatten all steps from all steps blocks
    $allSteps = $stepsBlocks->flatMap(function($block) {
        return $block->content['steps'] ?? [];
    })->sortBy('number')->values();
?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($allSteps->isNotEmpty()): ?>
    <section class="container-grid my-10 md:my-20">
        <div class="content">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Порядок действий</h2>
            <div class="flex flex-wrap gap-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <a href="#step-<?php echo e($step['number']); ?>" class="w-full sm:w-auto inline-flex items-center gap-2 px-4 py-2.5 bg-white rounded-full shadow-sm border border-gray-200 hover:shadow-md hover:border-indigo-400 hover:bg-indigo-50 transition-all cursor-pointer group">
                        <span class="shrink-0 w-6 h-6 gradient-icon-indigo rounded-full flex items-center justify-center text-white text-sm font-bold group-hover:scale-110 transition-transform">
                            <?php echo e($step['number']); ?>

                        </span>
                        <span class="font-medium group-hover:text-indigo-700 transition-colors">
                            <?php echo e($step['title']); ?>

                        </span>
                    </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<div class="container-grid my-10 md:my-20">
    <div class="content flex flex-col gap-7.5">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $service->contentBlocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($block->type, ['process_overview', 'intro'])): ?>
                <?php continue; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php
                $componentName = 'material-blocks.' . str_replace('_', '-', $block->type);
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(view()->exists("components.{$componentName}")): ?>
                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $componentName] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['content' => $block->content]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
            <?php else: ?>
                <!-- Fallback for unknown block types -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <p class="text-yellow-800">
                        Unknown block type: <strong><?php echo e($block->type); ?></strong>
                    </p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</div>


<!-- Back to Service -->


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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\SloDoks\resources\views/pages/services/content-blocks.blade.php ENDPATH**/ ?>