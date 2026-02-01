@props(['content'])

<div class="mb-10">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Идём по шагам</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($content['steps'] ?? [] as $index => $step)
            <a href="#step-{{ $index + 1 }}" class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-indigo-300 transition-all cursor-pointer group">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="text-white font-bold">{{ $index + 1 }}</span>
                </div>
                <div class="flex-grow">
                    <p class="text-gray-900 font-medium group-hover:text-indigo-600 transition-colors">{{ $step['step'] ?? $step }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
