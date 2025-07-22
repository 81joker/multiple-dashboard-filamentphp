<?php

namespace App\Filament\Resources\Admin\ParentsResource\Pages;

use App\Filament\Resources\Admin\ParentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParents extends ListRecords
{
    protected static string $resource = ParentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
