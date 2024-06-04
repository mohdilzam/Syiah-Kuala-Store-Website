<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers\AddressRelationManager;
use App\Models\Product;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Set;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Order Information')->schema([
                        Select::make('user_id')
                            ->label('Customer')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                            
                        Select::make('metode_pembayaran')
                            ->label('Metode Pembayaran')
                            ->options([
                                'cod' => 'Cash On Delivery',
                                'qris' => 'Qris',
                                'bca' => 'BCA',
                                'bsi' => 'BSI'
                            ])
                            ->required(),

                        Select::make('status_pembayaran')
                            ->label('Status Pembayaran')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                                'failed' => 'Failed',
                            ])
                            ->default('pending')
                            ->required(),

                        ToggleButtons::make('status')
                            ->inline()
                            ->default('new')
                            ->required()
                            ->options([
                                'new' => 'New',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'deliverd' => 'Delivered',
                                'canceled' => 'Cancelled',
                            ])
                            ->colors([
                                'new' => 'info',
                                'processing' => 'warning',
                                'shipped' => 'success',
                                'deliverd' => 'success',
                                'canceled' => 'danger',
                            ])
                            ->icons([
                                'new' => 'heroicon-m-sparkles',
                                'processing' => 'heroicon-m-arrow-path',
                                'shipped' => 'heroicon-m-truck',
                                'deliveed' => 'heroicon-m-check-badge',
                                'canceled' => 'heroicon-m-x-circle',
                            ]),

                        Select::make('shipping_method')
                            ->label('Shipping Method')
                            ->options([
                                'j&t' => 'J&T',
                                'jne' => 'JNE',
                                'shopeexpress' => 'Shopee Express',
                                'gosend' => 'GoSend',
                                'grab' => 'Grab'
                            ])
                    ]),

                    Section::make('Order Items')->schema([
                        Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->columnSpan(4)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Set $set) {
                                        $product = Product::find($state);
                                        $price = $product ? $product->price : 0;
                                        $set('jumlah_unit', $price);
                                        $set('jumlah_total', $price);
                                    }),

                                TextInput::make('quantity')
                                    ->numeric()
                                    ->required()
                                    ->default(1)
                                    ->minValue(1)
                                    ->columnSpan(2)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        $price = $get('jumlah_unit') ?? 0;
                                        $set('jumlah_total', $state * $price);
                                    }),
                                     
                                TextInput::make('jumlah_unit')
                                    ->numeric()
                                    ->required()
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(3),
                                     
                                TextInput::make('jumlah_total')
                                    ->numeric()
                                    ->required()
                                    ->dehydrated()
                                    ->columnSpan(3),

                            ])->columns(12),

                        Placeholder::make('total_bayar_placeholder')
                            ->label('Total Pembayaran')
                            ->content(function (Get $get, Set $set) {
                                $total = 0;
                                $items = $get('items') ?? [];

                                foreach ($items as $item) {
                                    $total += $item['jumlah_total'] ?? 0;
                                }
                                $set('total_bayar', $total);
                                return 'Rp ' . number_format($total, 2, ',', '.');
                            }),

                        Hidden::make('total_bayar')
                            ->default(0)
                    ])

                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('total_bayar')
                    ->numeric()
                    ->sortable()
                    ->money('IDR'),
                
                TextColumn::make('metode_pembayaran')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('status_pembayaran')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('shipping_method')
                    ->sortable(),
                
                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'deliverd' => 'Delivered',
                        'canceled' => 'Cancelled',
                    ])
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // 
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AddressRelationManager::class
        ];
    }

    public static function getNavigationBadge(): ?string {
        return static::getModel()::count();
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
