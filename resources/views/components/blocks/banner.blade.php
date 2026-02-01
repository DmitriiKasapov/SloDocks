{{--
  Banner Block Component

  Главный баннер (hero) с градиентным фоном, заголовком и поиском

  @param string $title - Основной заголовок (required)
  @param string $highlight - Подсвеченная часть заголовка (optional)
  @param string $subtitle - Подзаголовок (optional)
  @param bool $search - Показывать ли поиск (default: true)
  @param string $searchPlaceholder - Placeholder для поиска (optional)
  @param string $searchHint - Подсказка под поиском (optional)
  @param string $gradient - Градиент фона: 'blue' (default), 'purple', 'green' (optional)
  @param string $class - Дополнительные CSS классы (optional)

  Примеры:
  <x-blocks.banner
    title="Всё для жизни в Словении"
    highlight="на понятном языке"
    subtitle="Пошаговые инструкции и готовые документы для самостоятельного оформления"
  />

  <x-blocks.banner
    title="Найдите нужную услугу"
    :search="false"
  />

  <x-blocks.banner
    title="Добро пожаловать"
    gradient="purple"
    searchPlaceholder="Поиск по каталогу..."
  />
--}}

@props([
  'title' => '',
  'highlight' => '',
  'subtitle' => '',
  'search' => true,
  'searchPlaceholder' => 'Что вы ищете? Например: вид на жительство, школа, налоги...',
  'searchHint' => '',
  'gradient' => 'blue',
  'class' => '',
])

@php
  $gradientClasses = match($gradient) {
    'blue' => 'from-blue-600 via-indigo-600 to-violet-700',
    'purple' => 'from-purple-600 via-violet-600 to-indigo-700',
    'green' => 'from-emerald-600 via-teal-600 to-cyan-700',
    default => 'from-blue-600 via-indigo-600 to-violet-700',
  };
@endphp

<section class="relative bg-gradient-to-br {{ $gradientClasses }} overflow-hidden {{ $class }}">
  <!-- Decorative pattern background -->
  <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAgMi4yMTItMS43OSA0LTQgNHMtNC0xLjc4OC00LTQgMS43OS00IDQtNCA0IDEuNzg4IDQgNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-40"></div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
    <div class="text-center max-w-4xl mx-auto">
      @if($title || $slot->isNotEmpty())
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
          @if($slot->isNotEmpty())
            {{ $slot }}
          @else
            {{ $title }}
            @if($highlight)
              <br/>
              <span class="text-amber-300">{{ $highlight }}</span>
            @endif
          @endif
        </h1>
      @endif

      @if($subtitle)
        <p class="text-xl md:text-2xl text-blue-100 mb-10 leading-relaxed">
          {{ $subtitle }}
        </p>
      @endif

      @if($search)
        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto">
          <x-elements.form-items.search-input
            name="search"
            :placeholder="$searchPlaceholder"
            class="search-hero"
          >
            {{ $searchHint }}
          </x-elements.form-items.search-input>
        </div>
      @endif
    </div>
  </div>
</section>
