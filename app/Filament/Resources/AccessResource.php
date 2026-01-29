<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccessResource\Pages;
use App\Jobs\SendAccessEmail;
use App\Models\Access;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Support\Str;

class AccessResource extends Resource
{
    protected static ?string $model = Access::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationLabel = 'Доступы';

    protected static ?string $modelLabel = 'Доступ';

    protected static ?string $pluralModelLabel = 'Доступы';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Детали доступа')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('id')
                            ->label('ID'),

                        TextEntry::make('service.title')
                            ->label('Услуга'),

                        TextEntry::make('email')
                            ->label('Email'),

                        TextEntry::make('access_token')
                            ->label('Токен')
                            ->formatStateUsing(fn (string $state): string => Str::limit($state, 12, '…')),

                        TextEntry::make('starts_at')
                            ->label('Начало')
                            ->dateTime('d.m.Y H:i'),

                        TextEntry::make('expires_at')
                            ->label('Окончание')
                            ->dateTime('d.m.Y H:i'),

                        TextEntry::make('is_active')
                            ->label('Активен')
                            ->badge()
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Да' : 'Нет')
                            ->color(fn (bool $state): string => $state ? 'success' : 'danger'),

                        TextEntry::make('created_at')
                            ->label('Создан')
                            ->dateTime('d.m.Y H:i'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('service.title')
                    ->label('Услуга')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('access_token')
                    ->label('Токен')
                    ->formatStateUsing(fn (string $state): string => Str::limit($state, 8, '…'))
                    ->toggleable(),

                TextColumn::make('starts_at')
                    ->label('Начало')
                    ->dateTime('d.m.Y')
                    ->sortable(),

                TextColumn::make('expires_at')
                    ->label('Окончание')
                    ->dateTime('d.m.Y')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Активен')
                    ->boolean(),

                SelectFilter::make('service_id')
                    ->label('Услуга')
                    ->relationship('service', 'title'),
            ])
            ->actions([
                ViewAction::make(),

                Action::make('resend_email')
                    ->label('Отправить email')
                    ->icon('heroicon-o-envelope')
                    ->color('info')
                    ->requiresConfirmation()
                    ->modalHeading('Повторная отправка email')
                    ->modalDescription('Отправить email с данными доступа повторно?')
                    ->visible(fn (Access $record): bool => $record->is_active)
                    ->action(function (Access $record) {
                        SendAccessEmail::dispatch($record);

                        activity_log('access_email_resent', $record->email, [
                            'access_id' => $record->id,
                            'service_id' => $record->service_id,
                        ]);

                        Notification::make()
                            ->title('Email поставлен в очередь')
                            ->success()
                            ->send();
                    }),

                Action::make('deactivate')
                    ->label('Деактивировать')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Деактивация доступа')
                    ->modalDescription('Доступ будет деактивирован. Продолжить?')
                    ->visible(fn (Access $record): bool => $record->is_active)
                    ->action(function (Access $record) {
                        $record->update(['is_active' => false]);

                        activity_log('access_deactivated', $record->email, [
                            'access_id' => $record->id,
                            'service_id' => $record->service_id,
                        ]);

                        Notification::make()
                            ->title('Доступ деактивирован')
                            ->success()
                            ->send();
                    }),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccesses::route('/'),
            'view' => Pages\ViewAccess::route('/{record}'),
        ];
    }
}
