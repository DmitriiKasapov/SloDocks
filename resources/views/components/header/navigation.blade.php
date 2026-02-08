{{--
  header__navigation

  Navigation Component

  Simple navigation with items: Home, Test, and Contacts.
  On mobile displays icons, on desktop displays text labels.

  Features:
  - Active state detection via request()->routeIs()
  - ARIA attributes for accessibility
  - Responsive icon/text display

  Usage:
  <x-header.navigation />
--}}

@php
    // Navigation items configuration
    $navItems = [
        [
            'label' => 'Главная',
            'route' => 'home',
            'icon' => 'home',
            'active' => request()->routeIs('home'),
        ],
        [
            'label' => 'Test',
            'route' => 'test',
            'icon' => 'test',
            'active' => request()->routeIs('test'),
        ],
        [
            'label' => 'Контакты',
            'url' => '#contact',
            'icon' => 'phone',
            'active' => false,
        ],
    ];
@endphp

<nav class="header__navigation flex items-center" role="navigation" aria-label="Основная навигация">
    <ul class="flex items-center space-x-1 list-none m-0 p-0">
        @foreach($navItems as $item)
            <li itemscope itemtype="http://schema.org/SiteNavigationElement">
                <a
                    itemprop="url"
                    href="{{ isset($item['route']) ? route($item['route']) : ($item['url'] ?? '#') }}"
                    class="flex items-center justify-center md:px-4 px-2.5 py-2 font-medium transition-colors border-b-2 {{ $item['active'] ? 'text-amber-600 border-amber-600' : 'text-gray-700 border-transparent hover:text-amber-600' }}"
                    @if($item['active'])
                        aria-current="page"
                    @endif
                    aria-label="{{ $item['label'] }}"
                >
                    @if($item['icon'] === 'home')
                        {{-- Home icon --}}
                        <svg class="h-7 w-7 md:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10" />
                        </svg>
                    @elseif($item['icon'] === 'test')
                        {{-- Test icon (beaker/flask) --}}
                        <svg class="h-7 w-7 md:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    @elseif($item['icon'] === 'phone')
                        {{-- Email/contact icon (envelope with @) --}}
                        <svg class="h-7 w-7 md:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            <circle cx="12" cy="12" r="3" stroke-width="1.5"/>
                            <path d="M14.5 11.5c0-.8-.7-1.5-1.5-1.5s-1.5.7-1.5 1.5.2 1 .5 1.3" stroke-width="1.5"/>
                        </svg>
                    @endif
                    <span itemprop="name" class="hidden md:inline">{{ $item['label'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
