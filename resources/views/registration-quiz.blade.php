<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('Registration')}}
        </h2>
        @livewireStyles()
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <livewire:message-area/>
                <livewire:registration-form/>
            </div>
        </div>
    </div>
    @livewireScripts()
</x-app-layout>
