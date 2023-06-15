<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 mt-3 text-center text-4xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __("Tambah Task") }}
                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="w-1/2">
                        @include('partials.task-form')
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>