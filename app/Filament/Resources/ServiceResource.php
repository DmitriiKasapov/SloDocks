<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Услуги';

    protected static ?string $modelLabel = 'Услуга';

    protected static ?string $pluralModelLabel = 'Услуги';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('Основное')
                            ->schema([
                                Section::make()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Название')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function (string $state, callable $set, ?Service $record) {
                                                if (! $record) {
                                                    $set('slug', Str::slug($state));
                                                }
                                            }),

                                        TextInput::make('slug')
                                            ->label('URL slug')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(ignoreRecord: true),

                                        Select::make('category_id')
                                            ->label('Категория')
                                            ->relationship('category', 'name')
                                            ->required()
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([
                                                TextInput::make('name')
                                                    ->label('Название')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(function (string $state, callable $set) {
                                                        $set('slug', Str::slug($state));
                                                    }),
                                                TextInput::make('slug')
                                                    ->label('URL slug')
                                                    ->required()
                                                    ->maxLength(255),
                                                TextInput::make('order')
                                                    ->label('Порядок')
                                                    ->numeric()
                                                    ->default(0),
                                            ])
                                            ->helperText('Выберите из списка или создайте новую категорию'),

                                        Select::make('tags')
                                            ->label('Теги')
                                            ->relationship('tags', 'name')
                                            ->multiple()
                                            ->searchable()
                                            ->preload()
                                            ->minItems(2)
                                            ->maxItems(5)
                                            ->helperText('Выберите от 2 до 5 тегов. Используйте разные типы: Topic, Audience, Document')
                                            ->getOptionLabelFromRecordUsing(fn ($record) =>
                                                match($record->type) {
                                                    'topic' => '🟣 ' . $record->name,
                                                    'audience' => '🟢 ' . $record->name,
                                                    'document' => '🔵 ' . $record->name,
                                                    default => $record->name,
                                                }
                                            )
                                            ->columnSpanFull(),

                                        Textarea::make('description_public')
                                            ->label('Краткое описание')
                                            ->required()
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        TextInput::make('price')
                                            ->label('Цена (центы)')
                                            ->required()
                                            ->numeric()
                                            ->integer()
                                            ->minValue(0)
                                            ->helperText('В центах. Например 4900 = €49.00'),

                                        TextInput::make('access_duration_days')
                                            ->label('Доступ (дни)')
                                            ->required()
                                            ->numeric()
                                            ->integer()
                                            ->minValue(1),

                                        Toggle::make('is_active')
                                            ->label('Активна')
                                            ->default(true),
                                    ]),

                                Section::make('SEO')
                                    ->collapsed()
                                    ->schema([
                                        TextInput::make('seo_title')
                                            ->label('SEO Title')
                                            ->maxLength(255)
                                            ->helperText('Если пусто — используется название услуги'),

                                        Textarea::make('seo_description')
                                            ->label('SEO Description')
                                            ->rows(2)
                                            ->helperText('Если пусто — используется публичное описание'),
                                    ]),
                            ]),

                        Tabs\Tab::make('Материалы')
                            ->schema([
                                Section::make('Блоки контента')
                                    ->description('Перетаскивайте блоки для изменения порядка. Нажмите [+ Add] для добавления')
                                    ->schema([
                                        Builder::make('content_blocks')
                                            ->label('')
                                            ->blocks([
                                                // Intro block
                                                Builder\Block::make('intro')
                                                    ->label('Intro — вводный блок')
                                                    ->icon('heroicon-o-star')
                                                    ->schema([
                                                        TextInput::make('text')
                                                            ->label('Текст')
                                                            ->required()
                                                            ->maxLength(255),
                                                        TextInput::make('badge')
                                                            ->label('Бейдж')
                                                            ->maxLength(100)
                                                            ->placeholder('Актуально на 2026'),
                                                    ]),

                                                // Process Overview block
                                                Builder\Block::make('process_overview')
                                                    ->label('Process Overview — краткий обзор')
                                                    ->icon('heroicon-o-list-bullet')
                                                    ->schema([
                                                        Repeater::make('steps')
                                                            ->label('Шаги')
                                                            ->schema([
                                                                TextInput::make('step')
                                                                    ->label('Шаг')
                                                                    ->required(),
                                                            ])
                                                            ->defaultItems(3)
                                                            ->collapsible()
                                                            ->itemLabel(fn (array $state): ?string => $state['step'] ?? null),
                                                    ]),

                                                // Steps block
                                                Builder\Block::make('steps')
                                                    ->label('Пошаговая инструкция/step')
                                                    ->icon('heroicon-o-numbered-list')
                                                    ->schema([
                                                        Repeater::make('steps')
                                                            ->label('Шаги')
                                                            ->schema([
                                                                TextInput::make('number')
                                                                    ->label('Номер')
                                                                    ->numeric()
                                                                    ->required(),
                                                                TextInput::make('title')
                                                                    ->label('Заголовок')
                                                                    ->required(),
                                                                RichEditor::make('description')
                                                                    ->label('Описание'),
                                                                Repeater::make('items')
                                                                    ->label('Элементы списка')
                                                                    ->schema([
                                                                        TextInput::make('item')
                                                                            ->label('Элемент')
                                                                            ->required(),
                                                                    ])
                                                                    ->defaultItems(1)
                                                                    ->collapsible(),
                                                            ])
                                                            ->defaultItems(1)
                                                            ->collapsible()
                                                            ->itemLabel(fn (array $state): ?string =>
                                                                ($state['number'] ?? '') . '. ' . ($state['title'] ?? '')
                                                            ),
                                                    ]),

                                                // Tip block
                                                Builder\Block::make('tip')
                                                    ->label('Полезный совет')
                                                    ->icon('heroicon-o-light-bulb')
                                                    ->schema([
                                                        Select::make('level')
                                                            ->label('Уровень')
                                                            ->options([
                                                                'info' => 'Info',
                                                                'warning' => 'Warning',
                                                                'success' => 'Success',
                                                            ])
                                                            ->default('info')
                                                            ->required(),
                                                        RichEditor::make('text')
                                                            ->label('Текст')
                                                            ->required(),
                                                    ]),

                                                // Downloads block
                                                Builder\Block::make('downloads')
                                                    ->label('Downloads — бланки для скачивания')
                                                    ->icon('heroicon-o-arrow-down-tray')
                                                    ->schema([
                                                        Repeater::make('files')
                                                            ->label('Файлы')
                                                            ->schema([
                                                                TextInput::make('title')
                                                                    ->label('Название')
                                                                    ->required(),
                                                                FileUpload::make('file')
                                                                    ->label('Файл')
                                                                    ->disk('local')
                                                                    ->directory('materials/downloads')
                                                                    ->acceptedFileTypes(['application/pdf'])
                                                                    ->required(),
                                                            ])
                                                            ->defaultItems(1)
                                                            ->collapsible()
                                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                                                    ]),

                                                // Examples block
                                                Builder\Block::make('examples')
                                                    ->label('Examples — образцы заполнения')
                                                    ->icon('heroicon-o-document-duplicate')
                                                    ->schema([
                                                        Repeater::make('examples')
                                                            ->label('Образцы')
                                                            ->schema([
                                                                TextInput::make('title')
                                                                    ->label('Название')
                                                                    ->required(),
                                                                FileUpload::make('file')
                                                                    ->label('Файл')
                                                                    ->disk('local')
                                                                    ->directory('materials/examples')
                                                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                                                    ->required(),
                                                            ])
                                                            ->defaultItems(1)
                                                            ->collapsible()
                                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                                                    ]),

                                                // FAQ block
                                                Builder\Block::make('faq')
                                                    ->label('FAQ — часто задаваемые вопросы')
                                                    ->icon('heroicon-o-question-mark-circle')
                                                    ->schema([
                                                        Repeater::make('items')
                                                            ->label('Вопросы')
                                                            ->schema([
                                                                TextInput::make('q')
                                                                    ->label('Вопрос')
                                                                    ->required(),
                                                                Textarea::make('a')
                                                                    ->label('Ответ')
                                                                    ->required()
                                                                    ->rows(3),
                                                            ])
                                                            ->defaultItems(1)
                                                            ->collapsible()
                                                            ->itemLabel(fn (array $state): ?string => $state['q'] ?? null),
                                                    ]),

                                                // Help CTA block
                                                Builder\Block::make('help_cta')
                                                    ->label('Help CTA — блок помощи')
                                                    ->icon('heroicon-o-chat-bubble-left-right')
                                                    ->schema([
                                                        RichEditor::make('text')
                                                            ->label('Текст')
                                                            ->required(),
                                                        TextInput::make('link')
                                                            ->label('Ссылка')
                                                            ->url()
                                                            ->placeholder('/contact'),
                                                    ]),
                                            ])
                                            ->collapsible()
                                            ->blockNumbers(false)
                                            ->reorderable()
                                            ->cloneable(),
                                    ]),
                            ]),

                        Tabs\Tab::make('Доступ')
                            ->schema([
                                Section::make()
                                    ->description('Управление доступом будет реализовано позже')
                                    ->schema([
                                        // Placeholder for future access management features
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Категория')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->default('—'),

                TextColumn::make('tags.name')
                    ->label('Теги')
                    ->badge()
                    ->separator(',')
                    ->color('gray')
                    ->toggleable()
                    ->limit(3),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('price')
                    ->label('Цена')
                    ->formatStateUsing(fn (int $state): string => '€' . number_format($state / 100, 2))
                    ->sortable(),

                TextColumn::make('access_duration_days')
                    ->label('Дни')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Активна')
                    ->boolean(),

                TextColumn::make('purchases_count')
                    ->label('Покупки')
                    ->counts('purchases')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Создана')
                    ->dateTime('d.m.Y')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Активна')
                    ->boolean(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
