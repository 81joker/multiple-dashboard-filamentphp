<?php

namespace App\Filament\Resources\Admin\ProductsResource\Pages;

use App\Filament\Resources\Admin\ProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductsResource::class;
    protected static string $view = 'filament.resources.products-resource.pages.list-products';
    public Collection $products;

    public function mount(): void
    {
        parent::mount();
        $this->products = \App\Models\Product::all();
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    //     public function getTableData(): array
    // {
    //     return [
    //         'products' => \App\Models\Product::all(),
    //     ];
    // }
}
