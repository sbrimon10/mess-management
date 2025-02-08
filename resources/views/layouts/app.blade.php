<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('darkMode', value => localStorage.setItem('darkMode', value))"
      :class="{ 'dark': darkMode }" class="transition-colors duration-500 ease-in-out">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        
    </head>
    <body class="bg-white text-black dark:bg-gray-900 dark:text-white font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @if(session('warning'))
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4">
        <strong class="font-bold">Warning:</strong>
        <span>{{ session('warning') }}</span>
    </div>
@endif

            @include('layouts.navigation')

           
                @include('layouts.sidebar')
                <div class="flex-1 p-6">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
                </div>
           
        </div>

    </body>
</html>
