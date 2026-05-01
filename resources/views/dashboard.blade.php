<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-900 overflow-hidden shadow-2xl sm:rounded-xl border border-blue-800">
                <div class="p-6 text-gray-100 font-medium">
                    Role: {{ ucfirst(Auth::user()->role) }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
