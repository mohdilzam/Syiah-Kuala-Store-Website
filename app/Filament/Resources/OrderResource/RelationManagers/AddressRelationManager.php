<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('no_hp')
                    ->required()
                    ->tel()
                    ->maxLength(20),

                TextInput::make('kota')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kode_pos')
                    ->required()
                    ->numeric()
                    ->maxLength(10),

                TextArea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('alamat')
            ->columns([
                TextColumn::make('nama')
                    ->label("Nama"),

                TextColumn::make('no_hp'),

                TextColumn::make('kota'),

                TextColumn::make('kode_pos'),

                TextColumn::make('alamat'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
