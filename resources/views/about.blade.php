<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-900 overflow-hidden shadow-2xl sm:rounded-xl border border-blue-800">
                <div class="p-8 text-gray-100 leading-relaxed">
                    <div class="flex items-center gap-6 mb-6 pb-6 border-b border-blue-800">
                        <div class="w-20 h-20 rounded-full bg-indigo-600 flex items-center justify-center text-white text-3xl font-bold">
                            N
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Nabil Nasruddin Al Mutawakkil</h3>
                            <p class="text-blue-300">Software Developer / Student</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-950 p-6 rounded-lg border border-blue-800">
                            <span class="block text-sm text-blue-300 mb-1">NIM</span>
                            <span class="text-white font-medium text-lg">20230140002</span>
                        </div>
                        <div class="bg-blue-950 p-6 rounded-lg border border-blue-800">
                            <span class="block text-sm text-blue-300 mb-1">Program Studi</span>
                            <span class="text-white font-medium text-lg">Teknologi Informasi</span>
                        </div>
                        <div class="bg-blue-950 p-6 rounded-lg border border-blue-800 md:col-span-2">
                            <span class="block text-sm text-blue-300 mb-1">Hobi</span>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="bg-indigo-900 text-indigo-200 px-4 py-2 rounded-full text-sm font-medium border border-indigo-700">Olahraga</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>