<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Models\Tag;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Теги';

    protected static ?string $modelLabel = 'Тег';

    protected static ?string $pluralModelLabel = 'Теги';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основное')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Название')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $state, callable $set, ?Tag $record) {
                                if (! $record) {
                                    $set('slug', Str::slug($state));
                                }
                            })
                            ->helperText('Например: "Школа", "Родителям", "Бланки"'),

                        TextInput::make('slug')
                            ->label('URL slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Select::make('type')
                            ->label('Тип тега')
                            ->required()
                            ->options([
                                'topic' => '🟣 Topic (тема)',
                                'audience' => '🟢 Audience (для кого)',
                                'document' => '🔵 Document (формат)',
                            ])
                            ->helperText('Topic: Школа, Налоги | Audience: Родителям, Студентам | Document: Бланки, Инструкции'),

                        TextInput::make('order')
                            ->label('Порядок')
                            ->numeric()
                            ->default(0)
                            ->helperText('Чем меньше число, тем выше в списке'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),

                TextColumn::make('type')
                    ->label('Тип')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'topic' => 'Topic',
                        'audience' => 'Audience',
                        'document' => 'Document',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match($state) {
                        'topic' => 'purple',
                        'audience' => 'success',
                        'document' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('services_count')
                    ->label('Услуг')
                    ->counts('services')
                    ->sortable(),

                TextColumn::make('order')
                    ->label('Порядок')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
