

## Steps to create a calendar

### Step 1
1. Install package [fullcalendar](composer require saade/filament-fullcalendar
)
2. php artisan make:filament-widget CalendarWidget 

3. class CalendarWidget extends FullCalendarWidget

    * protected static string $view = 'filament.widgets.calendar-widget';

4. sail artisan make:model BookingDate -m
<!-- 4. return view('filament.widgets.calendar-widget', [
        'calendar' => $this->getCalendar(),
    ]); 
])
 -->
