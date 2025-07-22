<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\CalendarResource\Pages;
use App\Models\BookingDate;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use App\Filament\Widgets\CalendarWidget;
use Filament\Forms\Components\Tabs\Tab;

class CalendarResource extends Resource
{
    protected static ?string $model = BookingDate::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Trainingszeiten & Termine';
    protected static ?string $navigationLabel = 'Calendar';
    protected static ?string $slug = 'calendars';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                Grid::make()->schema([
                    DateTimePicker::make('start')->required(),
                    DateTimePicker::make('end')->required(),
                    TextInput::make('max_slots')
                        ->numeric()
                        ->label('Max slots (1-100)')
                        ->required()
                        ->minValue(1)
                        ->maxValue(100),
                    ColorPicker::make('color'),
                    MarkdownEditor::make('description')->columnSpan('full'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('start')->dateTime(),
                Tables\Columns\TextColumn::make('end')->dateTime(),
                Tables\Columns\TextColumn::make('max_slots'),
                Tables\Columns\ColorColumn::make('color'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                // Tables\Actions\ForceDeleteBulkAction::make(),
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
                'index' => Pages\ListCalendars::route('/'),
                'create' => Pages\CreateCalendar::route('/create'),
                'edit' => Pages\EditCalendar::route('/{record}/edit'),
            ];
    }

    public static function getCalendarWidget(): string
    {
        return CalendarWidget::class;
    }
}