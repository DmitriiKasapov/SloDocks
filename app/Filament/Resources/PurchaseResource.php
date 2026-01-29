<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurchaseResource\Pages;
use App\Models\Purchase;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PurchaseResource extends Resource
{
    protected static ?string $model = Purchase::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Покупки';

    protected static ?string $modelLabel = 'Покупка';

    protected static ?string $pluralModelLabel = 'Покупки';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Детали покупки')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('id')
                            ->label('ID'),

                        TextEntry::make('service.title')
                            ->label('Услуга'),

                        TextEntry::make('email')
                            ->label('Email'),

                        TextEntry::make('amount')
                            ->label('Сумма')
                            ->formatStateUsing(fn (int $state): string => '€' . number_format($state / 100, 2)),

                        TextEntry::make('currency')
                            ->label('Валюта'),

                        TextEntry::make('status')
                            ->label('Статус')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'paid' => 'success',
                                'pending' => 'warning',
                                'failed' => 'danger',
                                default => 'gray',
                            }),

                        TextEntry::make('payment_provider')
                            ->label('Провайдер'),

                        TextEntry::make('payment_id')
                            ->label('Payment ID'),

                        TextEntry::make('created_at')
                            ->label('Создана')
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

                TextColumn::make('amount')
                    ->label('Сумма')
                    ->formatStateUsing(fn (int $state): string => '€' . number_format($state / 100, 2))
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Статус')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('payment_provider')
                    ->label('Провайдер'),

                TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Статус')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'failed' => 'Failed',
                    ]),

                SelectFilter::make('service_id')
                    ->label('Услуга')
                    ->relationship('service', 'title'),
            ])
            ->actions([
                \Filament\Tables\Actions\ViewAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPurchases::route('/'),
            'view' => Pages\ViewPurchase::route('/{record}'),
        ];
    }
}
