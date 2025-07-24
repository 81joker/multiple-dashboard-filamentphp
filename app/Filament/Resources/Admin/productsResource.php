<?php

namespace App\Filament\Resources\Admin;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Admin\ProductsResource\Pages;
use App\Filament\Resources\Admin\ProductsResource\RelationManagers;

class ProductsResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Produkte / Buchhaltung  ';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Produktname'),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->label('Preis')
                    ->numeric()
                    ->minValue(0),
                Forms\Components\TextInput::make('num_trainings')
                    ->required()
                    ->label('Anzahl Trainings')
                    ->numeric()
                    ->minValue(0),
                Forms\Components\DateTimePicker::make('term_month')
                    ->label('Laufzeit in Monaten')
                    ->nullable()
                    ->default(now()->addMonth()->addHour())
                    ->minDate(now())
                    ->maxDate(now()->addYears(1)),
                Forms\Components\TextInput::make('sort')
                    ->default(999)
                    ->label('Sortierung')
                    ->numeric()
                    ->minValue(0),
                Forms\Components\Select::make('status')
                    ->options([
                        1 => 'Aktiv',
                        // 1 => 'Entwurf',
                        2 => 'In Bearbeitung',
                    ])
                    ->default(1)
                    ->label('Status'),
                Forms\Components\Section::make('Beschreibung')
                    ->description('Hier können Sie eine ausführliche Beschreibung des Produkts eingeben.')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Beschreibung'),
                    ])
            ]);
    }
    public static function getSlug(): string
{
    return 'products'; // This removes the extra "admin" from the path
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

    // public static function getRoutePrefix(): string
    // {
    //     return 'admin/products'; // instead of default 'admin/admin/products'
    // }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
