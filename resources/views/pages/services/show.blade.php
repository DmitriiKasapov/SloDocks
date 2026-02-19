@extends('layouts.app')

@section('title', $service->seo_title ?? $service->title)
@section('meta_description', $service->seo_description ?? $service->description_public)

@section('content')
    <x-blocks.breadcrumbs
        :items="[
            ['label' => 'Главная', 'url' => route('home')],
            ['label' => $service->title],
        ]"
    />

    <x-banners.second title="{{ $service->title }}" description="{{ $service->description_public ?? '' }}" />

    @if($service->intro_text)
        <section class="container-grid my-10 md:my-20">
            <div class="content">
                <div class="wysiwyg text-base">
                    {!! $service->intro_text !!}
                </div>
            </div>
        </section>
    @endif

    {{-- Service card --}}
    <section class="container-grid my-10 md:my-20">
        <div class="content">
            @if($hasAccess)
                @php
                    $daysRemaining = $access->daysRemaining();
                    $timeMessage = $access->getTimeRemainingMessage();
                    $borderColor = $daysRemaining <= 3 ? 'border-red-300' : ($daysRemaining <= 7 ? 'border-amber-300' : 'border-emerald-300');
                    $badgeBg = $daysRemaining <= 3 ? 'bg-red-100 text-red-800' : ($daysRemaining <= 7 ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800');
                    $sideBg = $daysRemaining <= 3 ? 'bg-red-50' : ($daysRemaining <= 7 ? 'bg-amber-50' : 'bg-emerald-50');
                    $sideBorder = $daysRemaining <= 3 ? 'border-red-300' : ($daysRemaining <= 7 ? 'border-amber-300' : 'border-emerald-300');
                @endphp
                <div class="bg-white rounded-2xl border-2 {{ $borderColor }} shadow-lg overflow-hidden">
                    <div class="flex flex-col lg:flex-row">
                        {{-- Left: service info --}}
                        <div class="flex-1 p-6 md:p-8">
                            <div class="inline-flex items-center px-3 py-1 {{ $badgeBg }} text-xs font-bold uppercase tracking-wide rounded-full mb-4">
                                Доступ открыт
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->title }}</h3>
                            @if($service->description_public)
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ $service->description_public }}
                                </p>
                            @endif
                            <div class="mt-4 flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ $timeMessage }}</span>
                            </div>
                        </div>
                        {{-- Right: access info + button --}}
                        <div class="lg:w-56 p-6 md:p-8 {{ $sideBg }} border-t-2 lg:border-t-0 lg:border-l-2 {{ $sideBorder }} flex flex-col items-center justify-center gap-4">
                            <div class="text-center">
                                <div class="text-sm text-gray-500">Доступ до</div>
                                <div class="text-lg font-bold text-gray-900 mt-1">
                                    {{ $access->expires_at->format('d.m.Y') }}
                                </div>
                            </div>
                            <x-elements.button.index
                                href="{{ route('services.content', $service->slug) }}?token={{ $access->access_token }}"
                                class="w-full justify-center"
                            >
                                Читать
                            </x-elements.button.index>
                        </div>
                    </div>
                </div>
            @else
                <div class="gradient-brand-lightest rounded-2xl border-2 border-amber-200 shadow-lg overflow-hidden">
                    <div class="flex flex-col lg:flex-row">
                        {{-- Left: service info --}}
                        <div class="flex-1 p-6 md:p-8">
                            <div class="inline-flex items-center px-3 py-1 bg-amber-200 text-amber-900 text-xs font-bold uppercase tracking-wide rounded-full mb-4">
                                Получите доступ к материалам
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->title }}</h3>
                            @if($service->description_public)
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ $service->description_public }}
                                </p>
                            @endif
                            <div class="mt-4 flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Доступ на {{ $service->access_duration_days }} дней</span>
                            </div>
                        </div>
                        {{-- Right: price + button --}}
                        <div class="lg:w-56 p-6 md:p-8 gradient-bg-gray-light border-t-2 lg:border-t-0 lg:border-l-2 border-amber-200 flex flex-col items-center justify-center gap-4">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-gray-900">
                                    €{{ number_format($service->price / 100, 0) }}
                                </div>
                                <div class="text-sm text-gray-500 mt-1">однократная оплата</div>
                            </div>
                            <form action="{{ route('payment.create') }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <x-elements.button.index submit="true" class="w-full justify-center">
                                    Купить
                                </x-elements.button.index>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <x-blocks.materials-included :service="$service" />

    <x-blocks.warning />

@endsection
