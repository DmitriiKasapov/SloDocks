# Правила для Claude

1. Всё общение с разработчиком — только на русском языке (кириллица).
2. Комментарии в коде — всегда на английском языке.
3. **НИКОГДА не использовать `<style>` теги в HTML/Blade файлах.** Все стили должны быть в CSS файлах (app.css или отдельных файлах стилей).
4. **Для всех кнопок использовать компонент `<x-elements.button.index>`.** НЕ создавать inline стили для кнопок.

## Использование компонента кнопки

Компонент: `<x-elements.button.index>`

**Параметры:**
- `variant` - Вариант: 'primary' (default), 'secondary'
- `size` - Размер: 'sm', 'lg' (default), ''
- `href` - URL для ссылки. Если указан, рендерит `<a>`, иначе `<button>`
- `submit` - Для `<button>`: если true, то type="submit"
- `arrow` - Стрелка: 'left', 'right', '' (default - без стрелки)
- `class` - Дополнительные CSS классы

**Стиль:**
- Градиент: `from-amber-500 to-orange-600` (соответствует логотипу)
- Шрифт: `font-semibold` (без uppercase для лучшей читаемости русского текста)
- Эффект hover: затемнение + увеличение тени

**Примеры использования:**

```blade
{{-- Простая кнопка (size="lg" по умолчанию) --}}
<x-elements.button.index>
    Купить
</x-elements.button.index>

{{-- Ссылка со стрелкой вправо --}}
<x-elements.button.index href="{{ route('services.show', $slug) }}" arrow="right">
    Перейти к материалам
</x-elements.button.index>

{{-- Кнопка "Назад" со стрелкой влево --}}
<x-elements.button.index href="{{ route('home') }}" arrow="left">
    На главную
</x-elements.button.index>

{{-- Submit кнопка в форме --}}
<x-elements.button.index submit="true">
    Отправить
</x-elements.button.index>

{{-- Вторичная кнопка --}}
<x-elements.button.index variant="secondary" href="{{ route('cancel') }}">
    Отменить
</x-elements.button.index>

{{-- Маленькая кнопка (когда нужен размер 'sm') --}}
<x-elements.button.index size="sm">
    Закрыть
</x-elements.button.index>
```
