@extends('layouts.app')

@section('title', 'Тестовая оплата')

@section('content')
<div class="max-w-lg mx-auto px-4 py-12">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">

        {{-- Header --}}
        <div class="bg-yellow-50 border-b border-yellow-200 px-6 py-3 text-center">
            <span class="text-sm font-medium text-yellow-800">
                MOCK — тестовый режим оплаты
            </span>
        </div>

        {{-- Service info --}}
        <div class="px-6 py-6 space-y-4">
            <h1 class="text-xl font-bold text-gray-900">{{ $service->title }}</h1>

            <div class="flex justify-between items-center text-sm text-gray-600">
                <span>Email</span>
                <span class="font-medium text-gray-900">{{ $purchase->email }}</span>
            </div>

            <div class="flex justify-between items-center text-sm text-gray-600">
                <span>Доступ</span>
                <span class="font-medium text-gray-900">{{ $service->access_duration_days }} дней</span>
            </div>

            <hr>

            <div class="flex justify-between items-center">
                <span class="text-lg font-semibold text-gray-900">Итого</span>
                <span class="text-2xl font-bold text-gray-900">&euro;{{ number_format($purchase->amount / 100, 2) }}</span>
            </div>
        </div>

        {{-- Actions --}}
        <div class="px-6 pb-6 space-y-3">
            <form action="{{ route('payment.mock.pay', $purchase) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-block bg-green-600 hover:bg-green-700">
                    Оплатить (тест)
                </button>
            </form>

            <x-elements.button.index
                variant="secondary"
                :link="route('payment.cancel')"
                class="w-full text-center"
            >
                Отменить
            </x-elements.button.index>
        </div>

        {{-- Footer --}}
        <div class="bg-gray-50 px-6 py-3 text-center">
            <p class="text-xs text-gray-400">
                ID: {{ $purchase->payment_id }}
            </p>
        </div>
    </div>
</div>
@endsection
