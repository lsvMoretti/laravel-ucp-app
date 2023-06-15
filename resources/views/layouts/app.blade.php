<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 grid grid-cols-6">
        <div class="col-span-1">
            @include('layouts.navigation')
        </div>

        <div class="col-span-5 flex flex-col">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow w-full py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-grow overflow-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
    </body>
</html>

</html>



</html>
