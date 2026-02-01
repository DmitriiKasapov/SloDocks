# ServiceContent API Reference

## Использование в контроллерах

### Загрузка услуги с контентом

```php
// С eager loading (рекомендуется)
$service = Service::with('content')->find($id);

// Или просто
$service = Service::find($id);
$content = $service->content; // lazy loading
```

## Использование в Blade templates

### Доступ к публичному контенту

```blade
{{-- Текст страницы --}}
{!! $service->content?->content !!}

{{-- Изображение --}}
@if($service->content?->image)
    <img src="{{ asset('storage/' . $service->content->image) }}" alt="{{ $service->title }}">
@endif
```

### Доступ к скрытому контенту (после оплаты)

```blade
{{-- Инструкция --}}
@if($service->content?->hidden_text_1)
    <div class="instruction">
        {!! $service->content->hidden_text_1 !!}
    </div>
@endif

{{-- PDF документы --}}
@if($service->content?->hidden_file_path_1)
    <a href="{{ route('service.download', ['service' => $service->id, 'file' => 1]) }}"
       class="btn">
        Скачать документ 1 (PDF)
    </a>
@endif

@if($service->content?->hidden_file_path_2)
    <a href="{{ route('service.download', ['service' => $service->id, 'file' => 2]) }}"
       class="btn">
        Скачать документ 2 (PDF)
    </a>
@endif

{{-- Список ссылок --}}
@if($service->content?->hidden_links)
    <ul>
        @foreach($service->content->hidden_links as $link)
            <li>
                <a href="{{ $link['url'] }}" target="_blank">
                    {{ $link['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
@endif

{{-- Практические советы --}}
@if($service->content?->hidden_text_2)
    <div class="tips">
        {!! $service->content->hidden_text_2 !!}
    </div>
@endif

{{-- Скрытое изображение --}}
@if($service->content?->hidden_image)
    <img src="{{ asset('storage/' . $service->content->hidden_image) }}"
         alt="Материалы">
@endif
```

## Проверка статуса контента

```blade
{{-- Опубликован ли контент --}}
@if($service->content?->status === 'published')
    {{-- Показываем контент --}}
@else
    <p>Контент находится в разработке</p>
@endif
```

## Создание контента программно

```php
use App\Models\Service;
use App\Models\ServiceContent;

// При создании услуги
$service = Service::create([
    'title' => 'Название услуги',
    'slug' => 'nazvanie-uslugi',
    'description_public' => 'Описание',
    'price' => 4900,
    'access_duration_days' => 30,
    'is_active' => true,
]);

// Создание контента
$service->content()->create([
    'content' => '<p>Текст страницы</p>',
    'hidden_text_1' => '<h2>Инструкция</h2>',
    'hidden_file_path_1' => 'services/hidden/document.pdf',
    'hidden_links' => [
        ['title' => 'Ссылка 1', 'url' => 'https://example.com'],
        ['title' => 'Ссылка 2', 'url' => 'https://example.org'],
    ],
    'hidden_text_2' => '<p>Практические советы</p>',
    'status' => 'published',
]);
```

## Обновление контента

```php
// Обновление существующего контента
$service->content->update([
    'content' => '<p>Обновлённый текст</p>',
]);

// Или создание, если не существует
$service->content()->updateOrCreate(
    ['service_id' => $service->id],
    ['content' => '<p>Новый текст</p>']
);
```

## Удаление

```php
// При удалении услуги контент удаляется автоматически (cascade)
$service->delete();

// Или удаление только контента
$service->content()->delete();
```

## Важные замечания

1. **Используйте null-safe оператор `?->`** при обращении к content, так как у услуги может не быть контента
2. **Eager loading** (`with('content')`) рекомендуется для избежания N+1 проблемы
3. **RichEditor поля** содержат HTML, используйте `{!! !!}` для вывода, но **ТОЛЬКО** если контент создаётся администратором
4. **Файлы** хранятся в `storage/app` (приватное хранилище), требуется контроллер для скачивания с проверкой доступа
5. **hidden_links** — это JSON массив, используйте `@foreach` для вывода
