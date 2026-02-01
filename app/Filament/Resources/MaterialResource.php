<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaterialResource\Pages;
use App\Models\Material;
use App\Models\MaterialBlock;
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
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Материалы';

    protected static ?string $modelLabel = 'Материал';

    protected static ?string $pluralModelLabel = 'Материалы';

    // Hide from navigation - blocks are now directly in Service
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основное')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Заголовок')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $state, callable $set, ?Material $record) {
                                if (! $record) {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        TextInput::make('slug')
                            ->label('URL slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Textarea::make('subtitle')
                            ->label('Короткое описание')
                            ->rows(2)
                            ->columnSpanFull(),

                        Select::make('service_id')
                            ->label('Привязка к услуге')
                            ->relationship('service', 'title')
                            ->searchable()
                            ->preload()
                            ->nullable(),

                        Select::make('status')
                            ->label('Статус')
                            ->options([
                                'draft' => 'Черновик',
                                'published' => 'Опубликовано',
                            ])
                            ->default('draft')
                            ->required(),
                    ]),

                Section::make('Блоки контента')
                    ->description('Перетаскивайте для изменения порядка')
                    ->schema([
                        Builder::make('blocks')
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('service.title')
                    ->label('Услуга')
                    ->searchable()
                    ->sortable()
                    ->default('—'),

                TextColumn::make('blocks_count')
                    ->label('Блоки')
                    ->counts('blocks')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Статус')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'Черновик',
                        'published' => 'Опубликовано',
                    }),

                TextColumn::make('updated_at')
                    ->label('Обновлён')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('updated_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }
}
