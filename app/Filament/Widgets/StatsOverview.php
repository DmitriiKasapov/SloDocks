<?php

namespace App\Filament\Widgets;

use App\Models\Access;
use App\Models\Purchase;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Оплаченные покупки', Purchase::where('status', 'paid')->count())
                ->icon('heroicon-o-credit-card')
                ->color('success'),

            Stat::make('Активные доступы', Access::where('is_active', true)->where('expires_at', '>', now())->count())
                ->icon('heroicon-o-key')
                ->color('info'),

            Stat::make('Пользователи', User::count())
                ->icon('heroicon-o-users')
                ->color('warning'),
        ];
    }
}
