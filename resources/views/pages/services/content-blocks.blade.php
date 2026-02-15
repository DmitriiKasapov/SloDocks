@extends('layouts.app')

@section('title', $service->title . ' - Материалы')
@section('meta_description', 'Материалы к услуге: ' . $service->title)

@push('head')
    <!-- Prevent indexing of content pages -->
    <meta name="robots" content="noindex, nofollow">
@endpush

@section('content')
<x-blocks.breadcrumbs :items="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => $service->title, 'url' => route('services.show', $service->slug)],
    ['label' => 'Материалы'],
]" class="mt-6 mb-2" />

<x-banners.second title="{{ $service->title }}" description="" />

<!-- Access Timer -->
@isset($access)
    <x-access-timer :access="$access" />
@endisset

{{-- TEMPORARY: Revoke access button for testing --}}
{{-- @if(app()->isLocal())
<section class="container-grid">
    <div class="content">
        <form action="{{ route('services.revoke-temp-access', $service->slug) }}" method="POST" class="inline-block">
            @csrf
            <button
                type="submit"
                class="text-sm text-gray-600 hover:text-red-600 transition-colors flex items-center gap-2"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Отказаться от доступа (тест)
            </button>
        </form>
    </div>
</section>
@endif --}}

{{-- Секция 1: Intro Blocks (before navigation) --}}
@if(!empty($service->intro_blocks))
    <div class="container-grid my-10 md:my-20">
        <div class="content flex flex-col gap-7.5">
            @foreach($service->intro_blocks as $block)
                @php
                    $blockType = $block['type'] ?? null;
                    $blockContent = $block['data'] ?? [];

                    // Skip if no valid type
                    if (!$blockType) continue;

                    $componentName = 'material-blocks.' . str_replace('_', '-', $blockType);
                @endphp

                @if(view()->exists("components.{$componentName}"))
                    <x-dynamic-component :component="$componentName" :content="$blockContent" />
                @endif
            @endforeach
        </div>
    </div>
@endif


<!-- Content Blocks -->
@php
    // Collect all steps blocks for auto-generated process overview
    $stepsBlocks = $service->contentBlocks->filter(function($block) {
        return $block->type === 'steps';
    });

    // Flatten all steps from all steps blocks
    $allSteps = $stepsBlocks->flatMap(function($block) {
        return $block->content['steps'] ?? [];
    })->sortBy('number')->values();
@endphp

{{-- Auto-generated Process Overview (if there are any steps blocks) --}}
@if($allSteps->isNotEmpty())
    <section class="container-grid my-10 md:my-20">
        <div class="content">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Порядок действий</h2>
            <div class="flex flex-wrap gap-3">
                @foreach($allSteps as $step)
                    <a href="#step-{{ $step['number'] }}" class="w-full sm:w-auto inline-flex items-center gap-2 px-4 py-2.5 bg-white rounded-full shadow-sm border border-gray-200 hover:shadow-md hover:border-indigo-400 hover:bg-indigo-50 transition-all cursor-pointer group">
                        <span class="shrink-0 w-6 h-6 gradient-icon-indigo rounded-full flex items-center justify-center text-white text-sm font-bold group-hover:scale-110 transition-transform">
                            {{ $step['number'] }}
                        </span>
                        <span class="font-medium group-hover:text-indigo-700 transition-colors">
                            {{ $step['title'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif

{{-- Секция 2: Content Blocks (after navigation) --}}
<div class="container-grid my-10 md:my-20">
    <div class="content flex flex-col gap-7.5">
        @foreach($service->contentBlocks as $block)
            {{-- Skip deprecated blocks (auto-generated or removed from admin) --}}
            @if(in_array($block->type, ['process_overview', 'intro']))
                @continue
            @endif

            @php
                $componentName = 'material-blocks.' . str_replace('_', '-', $block->type);
            @endphp

            @if(view()->exists("components.{$componentName}"))
                <x-dynamic-component :component="$componentName" :content="$block->content" />
            @else
                <!-- Fallback for unknown block types -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <p class="text-yellow-800">
                        Unknown block type: <strong>{{ $block->type }}</strong>
                    </p>
                </div>
            @endif
        @endforeach
    </div>
</div>


<!-- Back to Service -->
{{-- <section class="container-grid my-10 md:my-20 text-center">
    <div class="content">
        <x-elements.button.index
            href="{{ route('services.show', $service->slug) }}"
            variant="secondary"
            arrow="left"
        >
            Вернуться к описанию услуги
        </x-elements.button.index>
    </div>
</section> --}}

<x-blocks.warning />

@endsection
