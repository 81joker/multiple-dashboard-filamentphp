<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\ParentsResource\Pages;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Hidden;

class ParentsResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'parents';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Benutzer / Konten / Eltern';
    protected static ?string $navigationLabel = 'Eltern';
    protected static ?int $navigationSort = 0;

    protected static ?string $modelLabel = 'Parents';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                 TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->hiddenOn('edit'),
                    Hidden::make('role')
                 ->default('parent'),
            // Select::make('role')
            //     ->options(RoleStatusEnum::cases() ? collect(RoleStatusEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->name])->toArray() : [])
            //     ->required(),
            //    Select::make('role')
            // ->options([
            //   RoleStatusEnum::Parent->value => 'Parent',
            //   RoleStatusEnum::Instructor->value => 'Instructor',
            //   RoleStatusEnum::Admin->value => 'Admin',
            // ])->dehydrated()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              Tables\Columns\TextColumn::make('name')
                    ->searchable()->sortable()->label('Parent'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()->sortable()->label('E-Mail'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                   ,
                TextColumn::make('role')->getStateUsing(function (User $record) {
                    return $record->role;
                })
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParents::route('/'),
            'create' => Pages\CreateParents::route('/create'),
            'edit' => Pages\EditParents::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('role', '=', 'parent');
        // return parent::getEloquentQuery()
        //     ->withoutGlobalScopes([
        //         SoftDeletingScope::class,
        //     ]);
    }


    
}
