@extends('layouts.app')

@section('title', 'UI Kit — Кнопки')

@section('content')
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

{{-- Primary buttons --}}
<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Primary (variant="primary")</h2>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: lg (default)</h3>
            <div class="flex flex-wrap items-center gap-4">
                <x-elements.button.index>
                    Купить
                </x-elements.button.index>

                <x-elements.button.index arrow="right">
                    Перейти к материалам
                </x-elements.button.index>

                <x-elements.button.index arrow="left">
                    На главную
                </x-elements.button.index>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: sm</h3>
            <div class="flex flex-wrap items-center gap-4">
                <x-elements.button.index size="sm">
                    Закрыть
                </x-elements.button.index>

                <x-elements.button.index size="sm" arrow="right">
                    Далее
                </x-elements.button.index>

                <x-elements.button.index size="sm" arrow="left">
                    Назад
                </x-elements.button.index>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: default (без указания)</h3>
            <div class="flex flex-wrap items-center gap-4">
                <x-elements.button.index size="">
                    Отправить
                </x-elements.button.index>

                <x-elements.button.index size="" arrow="right">
                    Продолжить
                </x-elements.button.index>
            </div>
        </div>
    </div>
</section>

{{-- Secondary buttons --}}
<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Secondary (variant="secondary")</h2>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: lg (default)</h3>
            <div class="flex flex-wrap items-center gap-4">
                <x-elements.button.index variant="secondary">
                    Отменить
                </x-elements.button.index>

                <x-elements.button.index variant="secondary" arrow="right">
                    Подробнее
                </x-elements.button.index>

                <x-elements.button.index variant="secondary" arrow="left">
                    Вернуться
                </x-elements.button.index>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Size: sm</h3>
            <div class="flex flex-wrap items-center gap-4">
                <x-elements.button.index variant="secondary" size="sm">
                    Закрыть
                </x-elements.button.index>

                <x-elements.button.index variant="secondary" size="sm" arrow="right">
                    Далее
                </x-elements.button.index>

                <x-elements.button.index variant="secondary" size="sm" arrow="left">
                    Назад
                </x-elements.button.index>
            </div>
        </div>
    </div>
</section>

{{-- As links --}}
<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Ссылки (href="...")</h2>
        <p class="text-gray-600">Рендерятся как <code class="text-sm bg-gray-100 px-2 py-1 rounded">&lt;a&gt;</code> вместо <code class="text-sm bg-gray-100 px-2 py-1 rounded">&lt;button&gt;</code></p>

        <div class="flex flex-wrap items-center gap-4">
            <x-elements.button.index href="#">
                Primary ссылка
            </x-elements.button.index>

            <x-elements.button.index href="#" arrow="right">
                Перейти
            </x-elements.button.index>

            <x-elements.button.index variant="secondary" href="#">
                Secondary ссылка
            </x-elements.button.index>

            <x-elements.button.index variant="secondary" href="#" arrow="left">
                Назад
            </x-elements.button.index>
        </div>
    </div>
</section>

{{-- Submit buttons --}}
<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Submit (submit="true")</h2>
        <p class="text-gray-600">Рендерятся как <code class="text-sm bg-gray-100 px-2 py-1 rounded">&lt;button type="submit"&gt;</code></p>

        <div class="flex flex-wrap items-center gap-4">
            <x-elements.button.index submit="true">
                Отправить
            </x-elements.button.index>

            <x-elements.button.index submit="true" arrow="right">
                Купить
            </x-elements.button.index>

            <x-elements.button.index variant="secondary" submit="true">
                Сохранить черновик
            </x-elements.button.index>
        </div>
    </div>
</section>

{{-- Uppercase without arrows --}}
<section class="container-grid my-10 md:my-20">
    <div class="content space-y-8">
        <h2 class="text-2xl font-bold text-gray-900">Uppercase без стрелок</h2>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Primary</h3>
            <div class="flex flex-wrap items-center gap-4">
                <x-elements.button.index class="uppercase font-bold">
                    Купить
                </x-elements.button.index>

                <x-elements.button.index class="uppercase font-bold">
                    Перейти к материалам
                </x-elements.button.index>

                <x-elements.button.index class="uppercase font-bold">
                    Отправить
                </x-elements.button.index>

                <x-elements.button.index size="sm" class="uppercase font-bold">
                    Закрыть
                </x-elements.button.index>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Secondary</h3>
            <div class="flex flex-wrap items-center gap-4">
                <x-elements.button.index variant="secondary" class="uppercase font-bold">
                    Отменить
                </x-elements.button.index>

                <x-elements.button.index variant="secondary" class="uppercase font-bold">
                    Подробнее
                </x-elements.button.index>

                <x-elements.button.index variant="secondary" size="sm" class="uppercase font-bold">
                    Назад
                </x-elements.button.index>
            </div>
        </div>
    </div>
</section>

{{-- Combinations on dark background --}}
<section class="gradient-bg-gray-dark my-10 md:my-20">
    <div class="container-grid py-10 md:py-16">
        <div class="content space-y-8">
            <h2 class="text-2xl font-bold text-white">На тёмном фоне</h2>

            <div class="flex flex-wrap items-center gap-4">
                <x-elements.button.index>
                    Primary
                </x-elements.button.index>

                <x-elements.button.index variant="secondary">
                    Secondary
                </x-elements.button.index>

                <x-elements.button.index size="sm">
                    Small primary
                </x-elements.button.index>

                <x-elements.button.index variant="secondary" size="sm">
                    Small secondary
                </x-elements.button.index>
            </div>
        </div>
    </div>
</section>

@endsection
