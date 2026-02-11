{{-- material_blocks__faq --}}

@props(['content', 'class' => ''])

<div class="md:mt-7.5 {{ $class }}">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Часто задаваемые вопросы</h2>
    <div class="space-y-4">
        @foreach($content['items'] ?? [] as $item)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-bold text-gray-900 mb-3 flex items-start gap-3">
                    <span class="text-indigo-500">Q:</span>
                    <span>{{ $item['q'] }}</span>
                </h3>
                <p class="text-gray-700 leading-relaxed pl-7">
                    {{ $item['a'] }}
                </p>
            </div>
        @endforeach
    </div>
</div>
