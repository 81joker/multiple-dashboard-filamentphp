<?php

namespace App\Filament\Resources\Admin\ProductsResource\Pages;

use App\Filament\Resources\Admin\ProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProducts extends CreateRecord
{
    protected static string $resource = ProductsResource::class;
}
