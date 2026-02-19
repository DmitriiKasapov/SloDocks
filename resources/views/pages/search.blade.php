@extends('layouts.app')

@section('title', $query ? "Результаты поиска: {$query} — SloDocs" : 'Поиск — SloDocs')
@section('meta_description', $query ? "Найдено результатов по запросу '{$query}' — SloDocs" : 'Поиск по материалам SloDocs')

@section('content')
<!-- Search Banner -->
<section class="gradient-brand-vibrant py-16">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-8">
      <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
        @if($query)
          Результаты поиска
        @else
          Поиск материалов
        @endif
      </h1>
      @if($query)
        <p class="text-white/90 text-lg">
          По запросу: <span class="font-semibold">"{{ $query }}"</span>
        </p>
      @else
        <p class="text-white/90 text-lg">
          Введите запрос для поиска инструкций и материалов
        </p>
      @endif
    </div>

    <!-- Search Form -->
    <div class="max-w-2xl mx-auto">
      <form method="GET" action="{{ route('search') }}" class="relative" role="search">
        <label for="search-input" class="sr-only">Поиск по материалам</label>
        <input
          type="search"
          id="search-input"
          name="q"
          value="{{ $query }}"
          placeholder="Что вы ищете? Например: школа, вид на жительство, налоги..."
          autofocus
          class="w-full px-6 py-4 pr-14 rounded-xl border-2 border-white/20 text-gray-900 placeholder-gray-500 text-lg bg-white shadow-md transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-white/30 focus:border-white"
        >
        <button
          type="submit"
          aria-label="Искать"
          class="absolute right-2 top-1/2 -translate-y-1/2 gradient-brand-primary hover:gradient-button-primary-hover text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200"
        >
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </button>
      </form>
    </div>
  </div>
</section>

<!-- Search Results -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
  @if($query)
    {{-- Query exists --}}
    @if($total > 0)
      {{-- Results found --}}
      <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">
          Найдено результатов: {{ $total }}
        </h2>
        <p class="text-gray-600">
          Показаны материалы, соответствующие вашему запросу
        </p>
      </div>

      <!-- Results Grid -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        @foreach($results as $service)
          <x-blocks.service-card :service="$service" />
        @endforeach
      </div>

      <!-- Pagination -->
      @if($results->hasPages())
        <div class="flex justify-center">
          {{ $results->links() }}
        </div>
      @endif

    @else
      {{-- No results found --}}
      <div class="max-w-2xl mx-auto text-center">
        <!-- Message -->
        <h2 class="text-2xl font-bold text-gray-900 mb-3">
          Ничего не найдено
        </h2>
        <p class="text-gray-600 mb-6">
          По запросу <span class="font-semibold">"{{ $query }}"</span> не удалось найти подходящих материалов
        </p>

        <!-- Suggestions -->
        <div class="bg-amber-50 border border-amber-200 rounded-xl p-6 mb-6 text-left">
          <h3 class="font-semibold text-gray-900 mb-3">Попробуйте:</h3>
          <ul class="space-y-2 text-gray-700 text-sm">
            <li class="flex items-start">
              <svg class="w-5 h-5 text-amber-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              Изменить запрос или использовать другие ключевые слова
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 text-amber-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              Проверить правильность написания
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 text-amber-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              Использовать более общие термины
            </li>
          </ul>
        </div>

        <!-- Action Button -->
        <x-elements.button.index
          href="{{ route('home') }}"
        >
          На главную
        </x-elements.button.index>
      </div>
    @endif

  @else
    {{-- No query provided --}}
    <div class="max-w-2xl mx-auto text-center py-12">
      <div class="bg-white rounded-2xl shadow-sm p-12 border border-gray-100">
        <!-- Icon -->
        <div class="w-20 h-20 gradient-brand-icon-light rounded-full flex items-center justify-center mx-auto mb-6">
          <svg class="w-10 h-10 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </div>

        <!-- Message -->
        <h2 class="text-2xl font-bold text-gray-900 mb-3">
          Начните поиск
        </h2>
        <p class="text-gray-600 mb-8">
          Введите запрос в поле выше, чтобы найти нужные материалы и инструкции
        </p>

        <!-- Examples -->
        <div class="bg-gray-50 rounded-xl p-6 text-left">
          <h3 class="font-semibold text-gray-900 mb-3">Примеры запросов:</h3>
          <div class="flex flex-wrap gap-2">
            <a href="{{ route('search') }}?q=школа" class="inline-block px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 text-sm hover:border-amber-400 hover:text-amber-600 transition-colors ">
              школа
            </a>
            <a href="{{ route('search') }}?q=вид на жительство" class="inline-block px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 text-sm hover:border-amber-400 hover:text-amber-600 transition-colors ">
              вид на жительство
            </a>
            <a href="{{ route('search') }}?q=документы" class="inline-block px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 text-sm hover:border-amber-400 hover:text-amber-600 transition-colors ">
              документы
            </a>
            <a href="{{ route('search') }}?q=налоги" class="inline-block px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-700 text-sm hover:border-amber-400 hover:text-amber-600 transition-colors ">
              налоги
            </a>
          </div>
        </div>
      </div>
    </div>
  @endif
</section>
@endsection
