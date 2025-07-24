<x-filament-panels::page>
        <div class="container  border border-gray-200 rounded-md shadow-md py-6 px-6">
                <x-filament::grid default="1" sm="2" lg="3" xl="4" class="gap-6">
                        @foreach($this->products as $product)
                        <x-filament::card class="flex flex-col h-full">
                                <h5 class="text-start uppercase">{{ $product->title }}</h5>
                                <div class="flex font-bold mb-4 pb-1">
                                        <h1 class="text-blue-600/100 pr-1" style="font-size: 2rem;">€ {{ $product->price }}</h1>
                                         <sub class="text-gray-500 mt-6 uppercase" style="font-size: 1rem;">/ {{ $product->term_month }} Monate</sub>
                                </div>
                                <p class="text-gray-600 mb-4 text-sm">
                                {{ $product->description }}
                                </p>
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                <x-filament::button
                                    type="button"
                                    color="primary"
                                    size="sm"
                                    tag="a"
                                    href="{{ route('filament.admin.resources.products.edit', ['record' => $product->id]) }}"
                                    class="w-full py-3">
                                    Edit Product
                                </x-filament::button>
                            </div>
                        </x-filament::card>
                        @endforeach
                </x-filament::grid>
        </div>
</x-filament-panels::page>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
