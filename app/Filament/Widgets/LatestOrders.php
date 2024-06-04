<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Order;

class LatestOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2 ;

    public function table(Table $table): Table
    {
        return $table
            ->query(Order::query())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('Order Id')
                    ->searchable(),

                TextColumn::make('user.name')
                    ->searchable(),

                TextColumn::make('total_bayar')
                    ->money('IDR'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'info',
                        'processing' => 'warning',
                        'shipped' => 'success',
                        'deliverd' => 'success',
                        'canceled' => 'danger',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'new' => 'heroicon-m-sparkles',
                        'processing' => 'heroicon-m-arrow-path',
                        'shipped' => 'heroicon-m-truck',
                        'deliverd' => 'heroicon-m-check-badge',
                        'canceled' => 'heroicon-m-x-circle',
                    })
                    ->sortable(),

                TextColumn::make('metode_pembayaran')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status_pembayaran')
                    ->sortable()
                    ->badge()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Order')
                    ->dateTime()
            ])
            ->actions([
                Action::make('View Order')
                    ->url(fn (Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-m-eye'),
            ]);
    }
}
