# Правила для Claude

1. Всё общение с разработчиком — только на русском языке (кириллица).
2. Комментарии в коде — всегда на английском языке.
3. **НИКОГДА не использовать `<style>` теги в HTML/Blade файлах.** Все стили должны быть в CSS файлах (app.css или отдельных файлах стилей).
4. **Для всех кнопок использовать компонент `<x-elements.button.index>`.** НЕ создавать inline стили для кнопок.
5. **НИКОГДА не использовать inline стили (`style=""`) без крайней необходимости.** Всегда использовать Tailwind CSS классы. Для нестандартных значений использовать arbitrary values: `class="tracking-[1em]"`, `class="w-[123px]"`, и т.д.
6. **При создании блоков использовать систему `container-grid` + `content`.** Структура: `<section class="container-grid"><div class="content">...</div></section>`. Другие опции layout: см. `/resources/css/utilities/containerGrid.css`.
7. **В компонентах в первом комментарии указывать путь в формате с двойным подчеркиванием.** Формат: `blocks__warning`, `elements__button__index`. Это помогает быстро определить местоположение файла компонента.
8. **Все секционные компоненты должны иметь одинаковые вертикальные отступы.** Добавлять классы `my-10 md:my-20` к элементу `<section>` для единообразия spacing между секциями на всех страницах.
9. **НИКОГДА не использовать Tailwind градиенты напрямую (`bg-gradient-to-*`, `from-*`, `to-*`).** Все градиенты вынесены в утилиты в `/resources/css/utilities/gradients.css`. Всегда использовать готовые классы градиентов. См. раздел "Использование градиентов" ниже.

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
- Градиент: `gradient-button-primary` и `gradient-brand-primary` для hover (соответствует логотипу)
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

## Использование градиентов

Все градиенты вынесены в утилиты: `/resources/css/utilities/gradients.css`

**ВАЖНО:** НЕ использовать Tailwind классы градиентов (`bg-gradient-to-*`, `from-*`, `to-*`) напрямую. Всегда использовать готовые классы.

### Основные градиенты

**Бренд (оранжевые):**
- `gradient-brand-icon` — для иконок и акцентов логотипа
- `gradient-brand-primary` — для текста и акцентов
- `gradient-button-primary` — для кнопок
- `gradient-brand-light` — светлый фон (блоки предупреждений)
- `gradient-brand-lightest` — очень светлый фон с жёлтым акцентом
- `gradient-brand-vibrant` — яркий фон (hero секции поиска)

**Баннеры и заголовки:**
- `gradient-banner-primary` — синий градиент (blue → violet)
- `gradient-banner-secondary` — фиолетовый градиент (purple → indigo)
- `gradient-banner-tertiary` — зелёный градиент (emerald → cyan)
- `gradient-header-purple` — заголовки страниц материалов (indigo → violet)

**Цветные иконки:**
- `gradient-icon-emerald` — изумрудный
- `gradient-icon-blue` — синий
- `gradient-icon-indigo` — индиго
- `gradient-icon-violet` — фиолетовый
- `gradient-icon-pink` — розовый
- `gradient-icon-red` — красный

**Фоны секций:**
- `gradient-bg-blue-light` — светлый синий фон секций
- `gradient-bg-emerald-light` — светлый изумрудный фон
- `gradient-bg-gray-light` — светлый серый фон (хедеры карточек)
- `gradient-bg-gray-dark` — тёмный серый фон (футер)
- `gradient-bg-body` — основной фон body

**Блоки советов/алертов:**
- `gradient-tip-info` — информация (синий)
- `gradient-tip-warning` — предупреждение (жёлтый)
- `gradient-tip-success` — успех (зелёный)

**Декоративные элементы:**
- `gradient-blur-amber-light` — декоративный blur-элемент (светлый)
- `gradient-blur-orange-light` — декоративный blur-элемент (оранжевый)
- `gradient-blur-amber-subtle` — декоративный blur-элемент (едва заметный)

**Hover эффекты:**
- `gradient-hover-brand` — hover для элементов (фон становится оранжевым)

### Примеры использования

```blade
{{-- Иконка с брендовым градиентом --}}
<div class="w-10 h-10 gradient-brand-icon rounded-xl flex items-center justify-center">
    <svg class="w-6 h-6 text-white">...</svg>
</div>

{{-- Баннер с синим градиентом --}}
<section class="gradient-banner-primary py-20">
    <h1 class="text-white">Заголовок</h1>
</section>

{{-- Секция со светлым фоном --}}
<section class="gradient-bg-blue-light my-10 md:my-20">
    <div class="container-grid">
        <div class="content">...</div>
    </div>
</section>

{{-- Блок совета --}}
<div class="gradient-tip-info border-l-4 border-blue-400 rounded-xl p-6">
    Полезная информация
</div>

{{-- Ссылка с hover эффектом --}}
<a href="#" class="gradient-hover-brand p-3 rounded-lg">
    Наведите курсор
</a>
```
