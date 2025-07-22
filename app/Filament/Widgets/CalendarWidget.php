<?php

namespace App\Filament\Widgets;

use App\Models\BookingDate;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Saade\FilamentFullCalendar\Actions\CreateAction;
use Saade\FilamentFullCalendar\Actions\EditAction;
use Saade\FilamentFullCalendar\Actions\DeleteAction;
use Filament\Forms\Components\Grid;
use Illuminate\Database\Eloquent\Model;
use Forms\Form;


class CalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = BookingDate::class;

    public function fetchEvents(array $fetchInfo): array
    {
        return BookingDate::query()
            ->where('start', '>=', $fetchInfo['start'])
            ->where('end', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (BookingDate $event) => [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->start,
                    'end' => $event->end,
                    'max_slots' => $event->max_slots,
                    // 'url' => $event->url, // Make sure this field exists
                    'color' => $event->color,
                    'shouldOpenUrlInNewTab' => true,
                ]
            )
            ->all();
    }
    protected function headerActions(): array
    {
        return [
            CreateAction::make()
                ->label('New booking date Nehad') 
                ->model(BookingDate::class)
                ->form($this->getFormSchema()),
        ];
    }
    protected function modalActions(): array
    {
        return [
            CreateAction::make()
                ->label('New booking date modalActions')
                ->model(BookingDate::class)
                ->form($this->getFormSchema()),
                
                EditAction::make()
                ->using(function (BookingDate $record, array $data): Model {
                    $record->update($data);
                    return $record;
                }),
    
            DeleteAction::make()
                ->model(BookingDate::class),
        ];
    }

    public function getFormSchema(): array
    {
        return [
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
                // TextInput::make('url')->nullable(),
                ColorPicker::make('color'),
                MarkdownEditor::make('description')->columnSpan('full'),
            ])
        ];
    }

}