

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
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
  'class' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="blocks__seo-text container-grid my-10 md:my-20 <?php echo e($class); ?>">
    <div class="content">
        <div class="wysiwyg">
            <h2 class="text-center">Практическая информация для иностранцев в Словении</h2>

            <p>
                SloDocs — это информационный портал с пошаговыми инструкциями и примерами документов для самостоятельного оформления различных процедур в Словении.
                Мы собрали и структурировали практическую информацию, которая помогает разобраться в словенской бюрократии <b>без посредников, консультаций и лишних затрат</b>.
            </p>
            <p>
                Все материалы подготовлены для самостоятельного использования и ориентированы на реальные задачи, с которыми сталкиваются иностранцы при переезде и жизни в Словении.
            </p>

            <h3>Для кого эти материалы</h3>

            <p>Наши инструкции будут полезны, если вы:</p>

            <ul>
                <li>переезжаете в Словению и хотите понять, как оформить документы</li>
                <li>уже живёте в Словении и сталкиваетесь с новыми задачами (школа, жильё, работа)</li>
                <li>хотите сэкономить на посредниках и сделать всё самостоятельно</li>
                <li>ищете структурированную информацию на родном языке</li>
            </ul>

            <h3>Как это работает</h3>

            <p>Процесс максимально простой:</p>

            <ol>
                <li>Выбираете нужную тему из списка доступных материалов</li>
                <li>Оплачиваете разовый доступ к инструкции</li>
                <li>Получаете доступ к материалам на указанный email</li>
                <li>Следуете пошаговой инструкции и решаете свою задачу</li>
            </ol>
        </div>
    </div>
</section>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/blocks/seo-text.blade.php ENDPATH**/ ?>