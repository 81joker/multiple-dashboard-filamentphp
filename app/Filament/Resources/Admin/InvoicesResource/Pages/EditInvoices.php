<?php

namespace App\Filament\Resources\Admin\InvoicesResource\Pages;

use App\Filament\Resources\Admin\InvoicesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInvoices extends EditRecord
{
    protected static string $resource = InvoicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
