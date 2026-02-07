

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'title' => 'Что входит в каждый материал',
  'subtitle' => 'Всё необходимое для самостоятельного решения вашей задачи',
  'class' => '',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
  'title' => 'Что входит в каждый материал',
  'subtitle' => 'Всё необходимое для самостоятельного решения вашей задачи',
  'class' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="container-grid my-7.5 md:my-15 <?php echo e($class); ?>">
    <div class="content">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                <?php echo e($title); ?>

            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                <?php echo e($subtitle); ?>

            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Feature 1: Step-by-step instructions -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 gradient-icon-emerald rounded-xl flex items-center justify-center mb-4">
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

            <!-- Feature 2: Ready templates -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 gradient-icon-blue rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2 text-lg">Готовые образцы</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Заполненные примеры документов и бланки для скачивания
                </p>
            </div>

            <!-- Feature 3: Practical tips -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 gradient-icon-violet rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2 text-lg">Практические советы</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Рекомендации из реального опыта, лайфхаки и важные нюансы
                </p>
            </div>

            <!-- Feature 4: Instant access -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 gradient-brand-icon rounded-xl flex items-center justify-center mb-4">
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
<?php /**PATH D:\Projects\SloDoks\resources\views/components/blocks/features.blade.php ENDPATH**/ ?>