<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $label = "compradores";

    protected static ?string $navigationGroup = "Facturacion";

    protected static ?string $navigationLabel = "Compradores";

    protected static ?int $navigationSort = 3;

    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")
                    ->label("Nombre"),
                Forms\Components\TextInput::make("email")
                    ->label("Correo")
                    ->minLength(10)
                    ->maxLength(30)
                    ->email()
                    ->unique(),
                Forms\Components\TextInput::make("phone")
                    ->label("Celular")
                    ->minLength(10)
                    ->tel(),
                Forms\Components\TextInput::make("address")
                    ->label("Direccion")
                    ->minLength(20)
                    ->maxLength(50)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
