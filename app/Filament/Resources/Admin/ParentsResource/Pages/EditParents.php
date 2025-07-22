<?php

namespace App\Filament\Resources\Admin\ParentsResource\Pages;

use App\Filament\Resources\Admin\ParentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParents extends EditRecord
{
    protected static string $resource = ParentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
