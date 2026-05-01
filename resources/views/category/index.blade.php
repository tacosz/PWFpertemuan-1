<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category List') }}
            <p class="text-sm font-normal text-gray-500">Manage your category</p>
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

                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('category.create') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-sm">+ Add Category</a>
                    </div>

                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b dark:border-gray-700">
                                <th class="p-4">#</th>
                                <th class="p-4">NAME</th>
                                <th class="p-4">TOTAL PRODUCT</th>
                                <th class="p-4">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index => $category)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="p-4">{{ $index + 1 }}</td>
                                    <td class="p-4">{{ $category->name }}</td>
                                    <td class="p-4">{{ $category->products_count ?? 0 }}</td>
                                    <td class="p-4 flex gap-2">
                                        <x-edit-button :url="route('category.edit', $category->id)" />
                                        <x-delete-button :action="route('category.destroy', $category->id)" />
                                    </td>
                                </tr>
                            @endforeach
                            @if($categories->isEmpty())
                                <tr>
                                    <td colspan="4" class="p-4 text-center">No categories found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
