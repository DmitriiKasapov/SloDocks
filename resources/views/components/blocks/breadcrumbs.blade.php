{{--
  blocks__breadcrumbs

  Universal Breadcrumb Navigation Component

  @param array $items - Array of breadcrumb items:
    [
      ['label' => 'Home', 'url' => route('home')],
      ['label' => 'Current Page'],  // last item without url
    ]
  @param string $class - Additional CSS classes (optional)

  Example:
  <x-blocks.breadcrumbs :items="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => $service->title],
  ]" />
--}}

@props([
  'items' => [],
  'class' => '',
])

<nav class="blocks__breadcrumbs container-grid mt-10 mb-7.5 {{ $class }}" aria-label="Breadcrumb">
    <div class="content">
        <ol class="flex items-center flex-wrap gap-1 text-sm text-gray-500">
            @foreach ($items as $index => $item)
                @if (!$loop->first)
                    <li aria-hidden="true">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </li>
                @endif

                <li>
                    @if (!empty($item['url']) && !$loop->last)
                        <a href="{{ $item['url'] }}" class="hover:text-amber-600 transition-colors">
                            {{ $item['label'] }}
                        </a>
                    @else
                        <span class="text-gray-900 font-medium">{{ $item['label'] }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>
