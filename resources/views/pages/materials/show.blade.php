@extends('layouts.app')

@section('title', $material->title)
@section('meta_description', $material->subtitle)

@push('head')
    <!-- Prevent indexing of material pages if needed -->
    @if($material->service_id)
        <meta name="robots" content="noindex, nofollow">
    @endif
@endpush

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    @if($material->service)
        <nav class="mb-6">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-amber-600 transition-colors">
                        Главная
                    </a>
                </li>
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </li>
                <li>
                    <a href="{{ route('services.show', $material->service->slug) }}" class="text-gray-600 hover:text-amber-600 transition-colors">
                        {{ $material->service->title }}
                    </a>
                </li>
                <li>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </li>
                <li class="text-gray-900 font-medium">Материалы</li>
            </ol>
        </nav>
    @endif

    <!-- Page Title -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            {{ $material->title }}
        </h1>
        @if($material->subtitle)
            <p class="text-lg text-gray-600">
                {{ $material->subtitle }}
            </p>
        @endif
    </div>

    <!-- Material Blocks -->
    @foreach($material->activeBlocks as $block)
        @php
            $componentName = 'material-blocks.' . str_replace('_', '-', $block->type);
        @endphp

        @if(view()->exists("components.{$componentName}"))
            <x-dynamic-component :component="$componentName" :content="$block->content" />
        @else
            <!-- Fallback for unknown block types -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-8">
                <p class="text-yellow-800">
                    Unknown block type: <strong>{{ $block->type }}</strong>
                </p>
            </div>
        @endif
    @endforeach

    <!-- Back to Service (if linked) -->
    @if($material->service)
        <div class="text-center mt-12">
            <a
                href="{{ route('services.show', $material->service->slug) }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-indigo-600 transition-colors"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Вернуться к описанию услуги
            </a>
        </div>
    @endif
</div>
@endsection
