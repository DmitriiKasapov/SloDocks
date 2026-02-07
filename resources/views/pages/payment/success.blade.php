@extends('layouts.app')

@section('title', 'Оплата обрабатывается')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-lg shadow-lg p-8 text-center">
        <!-- Success Icon -->
        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-6">
            <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-4">
            Спасибо за оплату!
        </h1>

        <p class="text-lg text-gray-600 mb-6">
            Обрабатываем ваш платёж...
        </p>

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div class="text-left">
                    <h3 class="font-semibold text-blue-900 mb-2">Что дальше?</h3>
                    <ul class="text-sm text-blue-800 space-y-2">
                        <li>✓ Проверяем оплату (обычно это занимает несколько секунд)</li>
                        <li>✓ Отправляем ссылку с доступом на ваш email</li>
                        <li>✓ Вы можете сразу начать использовать материалы</li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="text-sm text-gray-600 mb-6">
            Если письмо не пришло в течение 5 минут, проверьте папку "Спам"
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <x-elements.button.index
                variant="secondary"
                href="{{ route('home') }}"
                arrow="left"
            >
                Вернуться на главную
            </x-elements.button.index>
        </div>

        @if($sessionId)
            <p class="text-xs text-gray-400 mt-8">
                Session ID: {{ $sessionId }}
            </p>
        @endif
    </div>
</div>
@endsection
