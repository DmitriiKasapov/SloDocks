{{--
  Navigation Component

  Responsive navigation menu with Alpine.js for mobile toggle.
  Combines desktop horizontal menu and mobile slide-out menu in one component.

  Features:
  - Active state detection via request()->routeIs()
  - ARIA attributes for accessibility
  - Alpine.js mobile menu toggle
  - Focus management

  Usage:
  <x-header.navigation />
--}}

@php
    // Navigation items configuration
    $navItems = [
        [
            'label' => 'Главная',
            'route' => 'home',
            'active' => request()->routeIs('home'),
        ],
        [
            'label' => 'Помощь',
            'url' => '#help',
            'active' => false,
        ],
        [
            'label' => 'Контакты',
            'url' => '#contact',
            'active' => false,
        ],
    ];
@endphp

<nav x-data="{ mobileMenuOpen: false }" class="flex items-center" role="navigation" aria-label="Основная навигация">
    {{-- Desktop Navigation --}}
    <ul class="hidden md:flex items-center space-x-1 list-none m-0 p-0">
        @foreach($navItems as $item)
            <li>
                <a
                    href="{{ isset($item['route']) ? route($item['route']) : ($item['url'] ?? '#') }}"
                    @class([
                        'block px-4 py-2 text-sm font-medium transition-colors border-b-2',
                        'text-amber-600 border-amber-600' => $item['active'],
                        'text-gray-700 border-transparent hover:text-amber-600' => !$item['active'],
                    ])
                    @if($item['active'])
                        aria-current="page"
                    @endif
                >
                    {{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ul>

    {{-- Mobile Menu Button --}}
    <div class="md:hidden">
        <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            type="button"
            class="inline-flex items-center justify-center p-2 rounded-lg text-gray-700 hover:text-amber-600 hover:bg-amber-50 transition-colors"
            :class="{ 'focus:outline-none focus:ring-2 focus:ring-amber-600 focus:ring-offset-2': mobileMenuOpen, 'focus:outline-none': !mobileMenuOpen }"
            :aria-expanded="mobileMenuOpen"
            aria-label="Открыть меню"
        >
            {{-- Hamburger icon --}}
            <svg
                x-show="!mobileMenuOpen"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            {{-- Close icon --}}
            <svg
                x-show="mobileMenuOpen"
                x-cloak
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Mobile Menu Panel --}}
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="mobileMenuOpen = false"
        x-cloak
        class="absolute top-16 right-4 left-4 md:hidden bg-white rounded-lg shadow-lg border border-gray-200 z-50"
    >
        <ul class="list-none m-0 p-5">
            @foreach($navItems as $item)
                <li>
                    <a
                        href="{{ isset($item['route']) ? route($item['route']) : ($item['url'] ?? '#') }}"
                        @class([
                            'block px-5 py-3 text-sm font-medium transition-colors border-l-4',
                            'text-amber-600 border-amber-600 bg-amber-50' => $item['active'],
                            'text-gray-700 border-transparent hover:bg-amber-50 hover:text-amber-600' => !$item['active'],
                        ])
                        @if($item['active'])
                            aria-current="page"
                        @endif
                        @click="mobileMenuOpen = false"
                    >
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>

{{-- Alpine.js cloaking styles --}}
<style>
    [x-cloak] {
        display: none !important;
    }
</style>
