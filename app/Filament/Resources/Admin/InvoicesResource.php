<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\InvoicesResource\Pages;
use App\Filament\Resources\Admin\InvoicesResource\RelationManagers;
use App\Models\Invoices;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoicesResource extends Resource
{
    protected static ?string $model = Invoices::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Produkte / Buchhaltung  ';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Invoice Information')
                    ->schema([
                        Forms\Components\TextInput::make('invoice_number')
                            ->label('Invoice #')
                            ->required(),
                            
                        Forms\Components\Fieldset::make('Company Information')
                            ->schema([
                                Forms\Components\TextInput::make('company_address')
                                    ->label('Address')
                                    ->default('Anzbachgasse 22, A-1140 Wien')
                                    ->required(),
                                Forms\Components\TextInput::make('company_email')
                                    ->label('Email')
                                    ->default('office@hp-torwartschule.at')
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('company_phone')
                                    ->label('Phone')
                                    ->default('+43 (0)676 97 29 412')
                                    ->required(),
                            ]),
                    ]),
                    
                Forms\Components\Section::make('Device Information')
                    ->schema([
                        Forms\Components\Select::make('device_type')
                            ->label('Device Type')
                            ->options([
                                'parent' => 'Parent',
                                'child' => 'Child',
                            ])
                            ->required(),
                            
                        Forms\Components\Repeater::make('items')
                            ->label('Device Items')
                            ->schema([
                                Forms\Components\TextInput::make('product_name')
                                    ->label('Product')
                                    ->required(),
                                Forms\Components\TextInput::make('price')
                                    ->label('Price')
                                    ->numeric()
                                    ->required(),
                                Forms\Components\TextInput::make('quantity')
                                    ->label('Qty')
                                    ->numeric()
                                    ->default(1)
                                    ->required(),
                            ])
                            ->columns(3)
                            ->addActionLabel('Add Item'),
                    ]),
                    
                Forms\Components\Section::make('Payment Information')
                    ->schema([
                        Forms\Components\Select::make('salesperson')
                            ->label('SALESPERSON')
                            ->options([
                                'Roy Greenfelder' => 'Roy Greenfelder',
                                // Add more salespeople as needed
                            ])
                            ->required(),
                            
                        Forms\Components\TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->prefix('€')
                            ->numeric()
                            ->default(0),
                            
                        Forms\Components\TextInput::make('discount')
                            ->label('Discount')
                            ->prefix('€')
                            ->numeric()
                            ->default(0),
                            
                        Forms\Components\TextInput::make('tax')
                            ->label('Tax')
                            ->prefix('€')
                            ->numeric()
                            ->default(0),
                            
                        Forms\Components\TextInput::make('total')
                            ->label('Total')
                            ->prefix('€')
                            ->numeric()
                            ->default(0),
                    ]),
                    
                Forms\Components\Section::make('Notes')
                    ->schema([
                        Forms\Components\Textarea::make('notes')
                            ->label('NOTE')
                            ->default('Invoice note')
                            ->columnSpanFull(),
                    ]),
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
        public static function getSlug(): string
{
    return 'invoices'; // This removes the extra "admin" from the path
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoices::route('/create'),
            'edit' => Pages\EditInvoices::route('/{record}/edit'),
        ];
    }
}
