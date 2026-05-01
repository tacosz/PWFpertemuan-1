<x-app-layout>
    <div class="py-12 min-h-screen bg-blue-950">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-blue-900 overflow-hidden shadow-2xl sm:rounded-xl border border-blue-800">
                <div class="p-8 text-gray-100">
                    
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                            <a href="{{ route('product.index') }}" class="text-blue-300 hover:text-white transition duration-150">&lt;</a> 
                            Add Product
                        </h2>
                        <p class="text-sm text-blue-200 mt-1 ml-7">Fill in the details to add a new product</p>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-500 bg-opacity-20 border border-red-500 text-red-100 p-4 mb-6 rounded-md">
                            <ul class="list-disc pl-5 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-5">
                            <label for="name" class="block text-sm font-medium text-blue-100 mb-1.5">Nama Produk</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g. Wireless Headphones" class="w-full bg-blue-950 border border-blue-800 rounded-lg text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-3 placeholder-blue-400" required>
                        </div>

                        <div class="mb-5">
                            <label for="category_id" class="block text-sm font-medium text-blue-100 mb-1.5">Kategori</label>
                            <select name="category_id" id="category_id" class="w-full bg-blue-950 border border-blue-800 rounded-lg text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-3">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-5 mb-8">
                            <div>
                                <label for="qty" class="block text-sm font-medium text-blue-100 mb-1.5">Quantity</label>
                                <input type="number" name="qty" id="qty" value="{{ old('qty', 0) }}" class="w-full bg-blue-950 border border-blue-800 rounded-lg text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-3" required min="0">
                            </div>
                            <div>
                                <label for="price" class="block text-sm font-medium text-blue-100 mb-1.5">Price (Rp)</label>
                                <input type="number" step="0.01" name="price" id="price" value="{{ old('price', 0) }}" class="w-full bg-blue-950 border border-blue-800 rounded-lg text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-3" required min="0">
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 pt-4 border-t border-blue-800 mt-6">
                            <a href="{{ route('product.index') }}" class="bg-transparent border border-blue-700 hover:bg-blue-800 text-blue-200 font-medium py-2 px-6 rounded-lg transition duration-200 ease-in-out text-sm">Cancel</a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium py-2 px-6 rounded-lg transition duration-200 ease-in-out shadow-lg shadow-indigo-500/30 text-sm">Save Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
