<?php

namespace App\Filament\Resources\Admin\instructorResource\Pages;

use App\Filament\Resources\Admin\instructorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class Editinstructor extends EditRecord
{
    protected static string $resource = instructorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
