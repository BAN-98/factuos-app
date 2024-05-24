<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = "Invoices";

    protected static ?string $navigationLabel = "Facturas";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make("name")
                    ->label("Nombre del Producto")
                    ->rules(["required", "max:255"]),

                Forms\Components\TextInput::make("price")
                    ->label("Precio del Producto")
                    ->rules(["required", "numeric"])
                    ->numeric(),

                Forms\Components\Textarea::make("description")
                    ->label("Descripción del Producto"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre del Producto')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Precio del Producto')
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción del Producto')
                    ->searchable(),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),

            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Agrega las relaciones si existen
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
