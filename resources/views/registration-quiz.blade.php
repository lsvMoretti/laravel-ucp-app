<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('Registration')}}
        </h2>
        @livewireStyles()
    </x-slot>
    <div class="py-12">
        @if(session()->has('message'))
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-6 shadow sm:rounded-lg text-center" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
                    {{session('message')}}
                </div>
            </div>
            <br/>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <livewire:registration-form/>
            </div>
        </div>
    </div>
    @livewireScripts()
</x-app-layout>
