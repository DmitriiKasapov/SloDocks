@extends('layouts.app')

@section('title', 'Компоненты кнопок — SloDocs')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h1 class="text-4xl font-bold text-gray-900 mb-4 text-center">
        Компоненты кнопок
    </h1>
    <p class="text-lg text-gray-600 text-center mb-12 max-w-2xl mx-auto">
        Универсальный компонент <code class="bg-gray-100 px-2 py-1 rounded text-sm">x-elements.button.index</code>
    </p>

    <section class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
        {{-- Primary buttons --}}
        <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Primary кнопки</h3>
            <div class="flex flex-wrap gap-4">
                <x-elements.button.index arrow="right">
                    Перейти к материалам
                </x-elements.button.index>

                <x-elements.button.index>
                    Получить доступ
                </x-elements.button.index>

                <x-elements.button.index href="{{ route('home') }}" arrow="left">
                    На главную
                </x-elements.button.index>
            </div>
        </div>

        {{-- Secondary buttons --}}
        <div class="mb-8 pt-8 border-t border-gray-200">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Secondary кнопки</h3>
            <div class="flex flex-wrap gap-4">
                <x-elements.button.index variant="secondary" arrow="left">
                    Отменить
                </x-elements.button.index>

                <x-elements.button.index variant="secondary">
                    Закрыть
                </x-elements.button.index>

                <x-elements.button.index variant="secondary" arrow="right">
                    Дополнительно
                </x-elements.button.index>
            </div>
        </div>

        {{-- Code examples --}}
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
@endsection
