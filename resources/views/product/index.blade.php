<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('product.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Product
                        </a>
                    </div>

                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b dark:border-gray-700">
                                <th class="p-4">Name</th>
                                <th class="p-4">Quantity</th>
                                <th class="p-4">Price</th>
                                <th class="p-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="p-4">{{ $product->name }}</td>
                                    <td class="p-4">{{ $product->qty }}</td>
                                    <td class="p-4">{{ number_format($product->price, 2) }}</td>
                                    <td class="p-4 flex gap-2">
                                        <a href="{{ route('product.show', $product->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-3 rounded text-sm">View</a>
                                        <a href="{{ route('product.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($products->isEmpty())
                                <tr>
                                    <td colspan="4" class="p-4 text-center">No products found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
