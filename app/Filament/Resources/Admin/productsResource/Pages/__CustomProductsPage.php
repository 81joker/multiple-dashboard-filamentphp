<?php


namespace App\Filament\Resources\Admin\ProductsResource\Pages;

use App\Filament\Resources\Admin\ProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\Page;
use App\Models\Product;

class CustomProductsPage extends Page
{
    protected static string $resource = ProductsResource::class;
    protected static string $view = 'products.custom-view'; // This will point to your Blade template

    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
