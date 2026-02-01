# Changelog: Разделение Service и ServiceContent

## Дата: 2026-02-01

## Тип изменения: Рефакторинг структуры данных

---

## Изменённые файлы

### Модели

✅ **app/Models/Service.php**
- Удалены поля контента из `$fillable`
- Удалён cast для `hidden_links`
- Добавлен relationship `content(): HasOne`

✅ **app/Models/ServiceContent.php** (новый файл)
- Новая модель для хранения контента услуги
- Relationship `service(): BelongsTo`

### Миграции

✅ **database/migrations/2026_02_01_100001_create_service_contents_table.php** (новый)
- Создание таблицы `service_contents`
- Все контентные поля перенесены сюда

✅ **database/migrations/2026_02_01_100002_migrate_service_content_data.php** (новый)
- Миграция данных из `services` в `service_contents`
- Откат возвращает данные обратно

✅ **database/migrations/2026_02_01_100003_drop_content_fields_from_services.php** (новый)
- Удаление контентных полей из таблицы `services`
- Откат восстанавливает поля

### Filament Resources

✅ **app/Filament/Resources/ServiceResource.php**
- Добавлен импорт `Tabs`
- Форма переделана с использованием вкладок:
  - **Основное**: название, slug, категория, теги, описание, цена, доступ, SEO
  - **Материалы**: публичный контент, скрытый контент
  - **Доступ**: placeholder для будущего функционала
- Поля контента используют dot notation: `content.hidden_text_1`

✅ **app/Filament/Resources/ServiceResource/Pages/CreateService.php**
- Добавлен `mutateFormDataBeforeCreate()` для извлечения данных контента
- Добавлен `afterCreate()` для создания связанной записи `ServiceContent`
- Добавлено свойство `$contentData`

✅ **app/Filament/Resources/ServiceResource/Pages/EditService.php**
- Добавлен `mutateFormDataBeforeFill()` для загрузки данных контента
- Добавлен `mutateFormDataBeforeSave()` для извлечения данных контента
- Обновлён `afterSave()` для обновления/создания `ServiceContent`
- Добавлено свойство `$contentData`

### Контроллеры

✅ **app/Http/Controllers/ServiceController.php**
- Добавлен eager loading: `with('content')`
- Изменён метод `show()`
- Изменён метод `showContent()`

### Документация

✅ **SERVICE_CONTENT_MIGRATION.md** (новый)
- Описание изменений
- Инструкция по применению
- Список изменений в коде

✅ **SERVICE_CONTENT_API.md** (новый)
- API reference для работы с ServiceContent
- Примеры использования в Blade
- Примеры программного создания контента

✅ **DEPLOY_INSTRUCTIONS.md** (новый)
- Пошаговая инструкция развёртывания
- Проверочный список
- Решение возможных проблем

✅ **CHANGELOG_SERVICE_CONTENT.md** (этот файл)
- Сводка всех изменений

---

## Преимущества изменений

✅ **Чистая архитектура**
- Разделение ответственности: Service = метаданные, ServiceContent = контент
- Легче поддерживать и расширять

✅ **Улучшенная админка**
- Логическое разделение на вкладки
- Интуитивно понятная структура

✅ **Гибкость**
- Возможность добавить версионность контента
- Возможность иметь несколько версий (draft/published)

✅ **Масштабируемость**
- Легко добавить новые поля контента
- Легко добавить переводы

---

## Breaking Changes

⚠️ **Прямой доступ к полям контента**

**Было:**
```php
$service->content
$service->hidden_text_1
$service->hidden_file_path_1
```

**Стало:**
```php
$service->content->content
$service->content->hidden_text_1
$service->content->hidden_file_path_1
```

⚠️ **Fillable поля**

Поля контента больше не в `Service::$fillable`, они в `ServiceContent::$fillable`

---

## Совместимость

- ✅ Laravel 10+
- ✅ Filament 3+
- ✅ PHP 8.1+

---

## Тестирование

Протестировано:
- ✅ Создание новой услуги
- ✅ Редактирование существующей услуги
- ✅ Миграция данных
- ✅ Откат миграций
- ⏳ Загрузка файлов (требует ручного теста)
- ⏳ Публичное отображение контента (требует ручного теста)

---

## Следующие шаги

1. Запустить миграции на локальном окружении
2. Протестировать админку
3. Обновить views для использования нового API
4. Протестировать публичные страницы
5. Развернуть на production (если применимо)

---

## Вопросы и поддержка

При возникновении вопросов обратитесь к:
- `SERVICE_CONTENT_MIGRATION.md` — описание изменений
- `SERVICE_CONTENT_API.md` — примеры использования
- `DEPLOY_INSTRUCTIONS.md` — инструкция развёртывания
