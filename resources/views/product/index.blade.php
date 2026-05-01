<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-900 overflow-hidden shadow-2xl sm:rounded-xl border border-blue-800">
                <div class="p-6 text-gray-100">
                    
                    @if (session('success'))
                        <div class="bg-green-500 bg-opacity-20 border border-green-500 text-green-100 p-4 mb-6 rounded-md text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-6 flex justify-end">
                        <a href="{{ route('product.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium py-2 px-6 rounded-lg transition duration-200 ease-in-out shadow-lg shadow-indigo-500/30 text-sm">Add Product</a>
                    </div>

                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-blue-800 text-blue-200 uppercase text-xs tracking-wider">
                                <th class="p-4">Name</th>
                                <th class="p-4">Quantity</th>
                                <th class="p-4">Price</th>
                                <th class="p-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach ($products as $product)
                                <tr class="border-b border-blue-800 hover:bg-blue-800/50 transition duration-150">
                                    <td class="p-4 text-white font-medium">{{ $product->name }}</td>
                                    <td class="p-4 text-blue-100">{{ $product->qty }}</td>
                                    <td class="p-4 text-blue-100">Rp {{ number_format($product->price, 2) }}</td>
                                    <td class="p-4 flex gap-2">
                                        <a href="{{ route('product.show', $product->id) }}" class="bg-blue-600 hover:bg-blue-500 text-white py-1 px-3 rounded-md text-xs transition duration-150">View</a>
                                        <a href="{{ route('product.edit', $product->id) }}" class="bg-emerald-600 hover:bg-emerald-500 text-white py-1 px-3 rounded-md text-xs transition duration-150">Edit</a>
                                        
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-rose-600 hover:bg-rose-500 text-white py-1 px-3 rounded-md text-xs transition duration-150" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($products->isEmpty())
                                <tr>
                                    <td colspan="4" class="p-8 text-center text-blue-300">No products found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
