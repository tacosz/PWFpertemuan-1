<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('View Product') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen bg-transparent">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-blue-900 rounded-xl overflow-hidden border border-blue-800 shadow-2xl">
                <!-- Header Card -->
                <div class="p-6 flex items-center justify-between border-b border-blue-800">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('product.index') }}" class="text-blue-300 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Product Detail</h3>
                            <p class="text-blue-200 text-sm">Viewing product #{{ $product->id }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('product.edit', $product->id) }}" class="bg-emerald-600 hover:bg-emerald-500 text-white font-medium py-2 px-4 rounded-lg transition duration-200 ease-in-out text-sm">Edit</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-rose-600 hover:bg-rose-500 text-white font-medium py-2 px-4 rounded-lg transition duration-200 ease-in-out text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>

                <!-- Body Card -->
                <div class="flex flex-col">
                    <div class="flex items-center justify-between p-6 border-b border-blue-800 hover:bg-blue-800/50 transition-colors">
                        <span class="text-blue-200 font-medium">Product Name</span>
                        <span class="text-white font-medium">{{ $product->name }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-6 border-b border-blue-800 hover:bg-blue-800/50 transition-colors">
                        <span class="text-blue-200 font-medium">Category</span>
                        <span class="text-white font-medium">{{ $product->category ? $product->category->name : 'Uncategorized' }}</span>
                    </div>

                    <div class="flex items-center justify-between p-6 border-b border-blue-800 hover:bg-blue-800/50 transition-colors">
                        <span class="text-blue-200 font-medium">Quantity</span>
                        <span class="bg-indigo-900 text-indigo-200 px-3 py-1 rounded-full text-sm font-semibold border border-indigo-700">{{ $product->qty }} In Stock</span>
                    </div>

                    <div class="flex items-center justify-between p-6 border-b border-blue-800 hover:bg-blue-800/50 transition-colors">
                        <span class="text-blue-200 font-medium">Price</span>
                        <span class="text-white font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>

                    <div class="flex items-center justify-between p-6 border-b border-blue-800 hover:bg-blue-800/50 transition-colors">
                        <span class="text-blue-200 font-medium">Owner</span>
                        <div class="flex items-center gap-3">
                            @php
                                $ownerName = \App\Models\User::find($product->user_id)->name ?? 'Unknown';
                                $initial = strtoupper(substr($ownerName, 0, 1));
                            @endphp
                            <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-sm">
                                {{ $initial }}
                            </div>
                            <span class="text-white font-medium">{{ $ownerName }}</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-6 border-b border-blue-800 hover:bg-blue-800/50 transition-colors">
                        <span class="text-blue-200 font-medium">Created At</span>
                        <span class="text-blue-100">{{ $product->created_at->format('d M Y, H:i') }}</span>
                    </div>

                    <div class="flex items-center justify-between p-6 hover:bg-blue-800/50 transition-colors">
                        <span class="text-blue-200 font-medium">Updated At</span>
                        <span class="text-blue-100">{{ $product->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
