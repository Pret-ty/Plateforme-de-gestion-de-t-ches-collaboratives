<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex space-x-8 border-b border-gray-300 dark:border-gray-700">
                    <a href="{{ route('projects.index') }}" class="hover:text-blue-500">Mes Projets</a>
                    <a href="#" class="hover:text-blue-500">Mes tâches </a>
                    <a href="{{ route('admin.users.index') }}" class="hover:text-blue-500">Gestion des utilisateurs</a>
                    <a href="#" class="hover:text-blue-500">Nouvelle tâche</a>
                </div>
            </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
