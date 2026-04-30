<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 border-b pb-2 dark:border-gray-700">Product Details</h3>
                        <dl class="mt-4 grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $product->name }}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Quantity</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $product->qty }}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Price</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ number_format($product->price, 2) }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('product.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                        <x-edit-button :url="route('product.edit', $product->id)" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
