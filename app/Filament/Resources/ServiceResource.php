<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
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
                Section::make('Основное')
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

                        Textarea::make('description_public')
                            ->label('Публичное описание')
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

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),

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
