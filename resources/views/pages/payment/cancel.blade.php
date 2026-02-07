@extends('layouts.app')

@section('title', 'Оплата отменена')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-lg p-8 text-center">
        <!-- Cancel Icon -->
        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-gray-100 mb-6">
            <svg class="h-10 w-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-4">
            Оплата отменена
        </h1>

        <p class="text-lg text-gray-600 mb-8">
            Вы отменили процесс оплаты. Не беспокойтесь — с вашей карты не было списано средств.
        </p>

        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-8">
            <p class="text-sm text-gray-700">
                Если у вас возникли проблемы или вопросы, вы всегда можете вернуться и попробовать снова.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <x-elements.button.index
                variant="secondary"
                href="{{ route('home') }}"
                arrow="left"
            >
                Вернуться на главную
            </x-elements.button.index>
            <x-elements.button.index
                variant="primary"
                href="javascript:history.back()"
            >
                Попробовать снова
            </x-elements.button.index>
        </div>
    </div>
</div>
@endsection
