<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Order Baru', Order::query()->where('status', 'new')->count()),
            Stat::make('Orders Processing', Order::query()->where('status', 'processing')->count()),
            Stat::make('Order Shipped', Order::query()->where('status', 'shipped')->count()),
            Stat::make('Total Orders', $this->formatCurrency(Order::query()->avg('total_bayar'))),
        ];
    }

    protected function formatCurrency($amount)
    {
        if ($amount >= 1000000) {
            return 'IDR ' . number_format($amount / 1000000, 1) . 'M';
        } elseif ($amount >= 1000) {
            return 'IDR ' . number_format($amount / 1000, 1) . 'K';
        } else {
            return 'IDR ' . number_format($amount, 0, ',', '.');
        }
    }
}