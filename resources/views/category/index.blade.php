<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Category List') }}
            <p class="text-sm font-normal text-blue-200 mt-1">Manage your category</p>
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
                        <a href="{{ route('category.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium py-2 px-6 rounded-lg transition duration-200 ease-in-out shadow-lg shadow-indigo-500/30 text-sm">+ Add Category</a>
                    </div>

                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-blue-800 text-blue-200 uppercase text-xs tracking-wider">
                                <th class="p-4 w-16">#</th>
                                <th class="p-4">NAME</th>
                                <th class="p-4">TOTAL PRODUCT</th>
                                <th class="p-4 w-32">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach ($categories as $index => $category)
                                <tr class="border-b border-blue-800 hover:bg-blue-800/50 transition duration-150">
                                    <td class="p-4 text-blue-300 font-medium">{{ $index + 1 }}</td>
                                    <td class="p-4 text-white font-medium">{{ $category->name }}</td>
                                    <td class="p-4 text-blue-100">{{ $category->products_count ?? 0 }}</td>
                                    <td class="p-4 flex gap-2">
                                        <a href="{{ route('category.edit', $category->id) }}" class="bg-emerald-600 hover:bg-emerald-500 text-white py-1 px-3 rounded-md text-xs transition duration-150">Edit</a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-rose-600 hover:bg-rose-500 text-white py-1 px-3 rounded-md text-xs transition duration-150" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($categories->isEmpty())
                                <tr>
                                    <td colspan="4" class="p-8 text-center text-blue-300">No categories found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
