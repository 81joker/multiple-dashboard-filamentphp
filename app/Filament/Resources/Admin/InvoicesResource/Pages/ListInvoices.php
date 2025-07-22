<?php

namespace App\Filament\Resources\Admin\InvoicesResource\Pages;

use App\Filament\Resources\Admin\InvoicesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
