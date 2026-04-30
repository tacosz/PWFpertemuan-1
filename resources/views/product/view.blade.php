<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1e2433] rounded-xl overflow-hidden border border-gray-700 shadow-xl">
                <!-- Header Card -->
                <div class="p-6 flex items-center justify-between border-b border-gray-700">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('product.index') }}" class="text-gray-400 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Product Detail</h3>
                            <p class="text-gray-400 text-sm">Viewing product #{{ $product->id }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <x-edit-button :url="route('product.edit', $product->id)" />
                        <x-delete-button :action="route('product.destroy', $product->id)" />
                    </div>
                </div>

                <!-- Body Card -->
                <div class="flex flex-col">
                    <div class="flex items-center justify-between p-6 border-b border-gray-700 hover:bg-[#252b3b] transition-colors">
                        <span class="text-gray-400 font-medium">Product Name</span>
                        <span class="text-white font-medium">{{ $product->name }}</span>
                    </div>

                    <div class="flex items-center justify-between p-6 border-b border-gray-700 hover:bg-[#252b3b] transition-colors">
                        <span class="text-gray-400 font-medium">Quantity</span>
                        <span class="bg-green-900/50 text-green-400 px-3 py-1 rounded-full text-sm font-semibold border border-green-800">{{ $product->qty }} In Stock</span>
                    </div>

                    <div class="flex items-center justify-between p-6 border-b border-gray-700 hover:bg-[#252b3b] transition-colors">
                        <span class="text-gray-400 font-medium">Price</span>
                        <span class="text-white font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>

                    <div class="flex items-center justify-between p-6 border-b border-gray-700 hover:bg-[#252b3b] transition-colors">
                        <span class="text-gray-400 font-medium">Owner</span>
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

                    <div class="flex items-center justify-between p-6 border-b border-gray-700 hover:bg-[#252b3b] transition-colors">
                        <span class="text-gray-400 font-medium">Created At</span>
                        <span class="text-gray-300">{{ $product->created_at->format('d M Y, H:i') }}</span>
                    </div>

                    <div class="flex items-center justify-between p-6 hover:bg-[#252b3b] transition-colors">
                        <span class="text-gray-400 font-medium">Updated At</span>
                        <span class="text-gray-300">{{ $product->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
