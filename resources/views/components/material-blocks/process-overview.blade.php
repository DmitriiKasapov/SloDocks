@props(['content'])

<div class="mb-10">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Идём по шагам</h2>
    <div class="flex flex-wrap gap-3">
        @foreach($content['steps'] ?? [] as $index => $step)
            <a href="#step-{{ $index + 1 }}" class="w-full sm:w-auto inline-flex items-center gap-2 px-4 py-2.5 bg-white rounded-full shadow-sm border border-gray-200 hover:shadow-md hover:border-indigo-400 hover:bg-indigo-50 transition-all cursor-pointer group">
                <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-full flex items-center justify-center text-white text-sm font-bold group-hover:scale-110 transition-transform">
                    {{ $index + 1 }}
                </span>
                <span class="text-gray-700 text-sm font-medium group-hover:text-indigo-700 transition-colors">
                    {{ $step['step'] ?? $step }}
                </span>
            </a>
        @endforeach
    </div>
</div>
