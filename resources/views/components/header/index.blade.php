{{--
  header__index

  Header Component

  Main header wrapper with sticky positioning and backdrop blur effect.
  Contains logo and navigation components.

  Usage:
  <x-header />
--}}

<header class="bg-white/80 backdrop-blur-md border-b border-indigo-100 sticky top-0 z-50" role="banner">
    <div class="container-grid">
        <div class="content flex justify-between items-center h-16">
            {{-- Logo --}}
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2" aria-label="SloDocs - Главная страница">
                    <div class="w-8 h-8 gradient-brand-icon rounded-lg flex items-center justify-center" aria-hidden="true">
                        <span class="text-white font-bold text-sm">SD</span>
                    </div>
                    <span class="text-xl font-bold gradient-text-gray">
                        SloDocs
                    </span>
                </a>
            </div>

            {{-- Navigation --}}
            <x-header.navigation />
        </div>
    </div>
</header>
