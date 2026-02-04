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

<!-- What You Get Section -->
<section class="bg-gradient-to-br from-indigo-50 via-blue-50 to-cyan-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Что входит в каждый материал
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Всё необходимое для самостоятельного решения вашей задачи
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Benefit 1 -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2 text-lg">Пошаговые инструкции</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Подробное руководство по каждому этапу с понятными объяснениями
                </p>
            </div>

            <!-- Benefit 2 -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2 text-lg">Готовые образцы</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Заполненные примеры документов и бланки для скачивания
                </p>
            </div>

            <!-- Benefit 3 -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-gradient-to-br from-violet-400 to-purple-500 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2 text-lg">Практические советы</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Рекомендации из реального опыта, лайфхаки и важные нюансы
                </p>
            </div>

            <!-- Benefit 4 -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2 text-lg">Мгновенный доступ</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Получите материалы сразу после оплаты на указанный email
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SEO Text Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="max-w-4xl mx-auto">
        <div class="prose prose-lg max-w-none">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">
                Информация для русскоговорящих иностранцев в Словении
            </h2>

            <p class="text-gray-700 leading-relaxed mb-6">
                SloDocs — это информационный портал с практическими материалами для самостоятельного оформления различных процедур в Словении. Мы собрали и систематизировали информацию, которая поможет вам разобраться в словенской бюрократии без посредников.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">
                Для кого эти материалы
            </h3>

            <p class="text-gray-700 leading-relaxed mb-4">
                Наши инструкции будут полезны, если вы:
            </p>

            <ul class="space-y-2 text-gray-700 mb-6">
                <li class="flex items-start">
                    <svg class="w-6 h-6 text-emerald-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Переезжаете в Словению и хотите разобраться в оформлении документов
                </li>
                <li class="flex items-start">
                    <svg class="w-6 h-6 text-emerald-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Уже живете в Словении и сталкиваетесь с новыми задачами (школа, жилье, работа)
                </li>
                <li class="flex items-start">
                    <svg class="w-6 h-6 text-emerald-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Хотите сэкономить на посредниках и всё сделать самостоятельно
                </li>
                <li class="flex items-start">
                    <svg class="w-6 h-6 text-emerald-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Нуждаетесь в структурированной информации на русском языке
                </li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">
                Как это работает
            </h3>

            <p class="text-gray-700 leading-relaxed mb-4">
                Процесс максимально простой:
            </p>

            <ol class="space-y-3 text-gray-700 mb-6">
                <li class="flex items-start">
                    <span class="flex-shrink-0 w-7 h-7 bg-gradient-to-br from-amber-400 to-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm mr-3 mt-0.5">1</span>
                    <span>Выбираете нужную тему из списка доступных материалов</span>
                </li>
                <li class="flex items-start">
                    <span class="flex-shrink-0 w-7 h-7 bg-gradient-to-br from-amber-400 to-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm mr-3 mt-0.5">2</span>
                    <span>Оплачиваете разовый доступ к инструкции</span>
                </li>
                <li class="flex items-start">
                    <span class="flex-shrink-0 w-7 h-7 bg-gradient-to-br from-amber-400 to-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm mr-3 mt-0.5">3</span>
                    <span>Получаете ссылку на материалы на указанный email</span>
                </li>
                <li class="flex items-start">
                    <span class="flex-shrink-0 w-7 h-7 bg-gradient-to-br from-amber-400 to-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm mr-3 mt-0.5">4</span>
                    <span>Следуете пошаговой инструкции и решаете свою задачу</span>
                </li>
            </ol>
        </div>
    </div>
</section>

<!-- Warning Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="bg-gradient-to-r from-amber-50 to-orange-50 border-l-4 border-amber-400 rounded-xl p-8 shadow-sm">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-amber-400 rounded-full flex items-center justify-center">
                    <span class="text-2xl">⚠️</span>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-bold text-amber-900 mb-3">
                    Важное уведомление
                </h3>
                <div class="text-amber-800 leading-relaxed space-y-2">
                    <p>
                        <strong>Материалы носят исключительно информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Мы не несем ответственности за результаты применения информации</li>
                        <li>При возникновении сложных ситуаций рекомендуем обращаться к квалифицированным специалистам</li>
                        <li>Информация регулярно обновляется, но законодательство может меняться</li>
                    </ul>
                    <p class="mt-4 text-sm">
                        Используя наши материалы, вы подтверждаете понимание их информационного характера.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\SloDoks\resources\views/pages/home.blade.php ENDPATH**/ ?>