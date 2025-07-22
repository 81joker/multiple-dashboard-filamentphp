<?php

namespace App\Filament\Widgets;

use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Saade\FilamentFullCalendar\Actions;
use App\Models\BookingDate;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Forms\Components\DateTimePicker;
use Filament\Actions\ViewAction;


class CalendarWidget extends FullCalendarWidget
{
    // public  $model = BookingDate::class;

    protected function headerActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function modalActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function viewAction(): \Filament\Actions\Action
{
    return ViewAction::make();
}

    public function getFormSchema(): array
    {
        return [
          TextInput::make('name'),

          Grid::make()
                ->schema([
                  DateTimePicker::make('starts_at'),

                  DateTimePicker::make('ends_at'),
                ]),
        ];
    }
}