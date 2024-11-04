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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen pt-0 grid grid-cols-1 md:grid-cols-2 gap-0 bg-[url('https://i.pinimg.com/originals/c7/de/72/c7de72713f0a83a99e0754a69cc761a6.jpg')] bg-blend-multiply bg-cover ">
            <div class=" hidden sm:visible sm:h-full sm:w-full bg-opacity-50 justify-center items-center sm:flex">
                <a href="/" class="backdrop-blur-xl rounded-2xl bg-cyan-300/20 p-5">
                    <x-application-logo class=" w-full h-auto fill-current text-gray-500 drop-shadow-[2px_4px_3px_rgba(255,255,255,0.78)]" />
                </a>
            </div>
            <div class=" h-full backdrop-blur-2xl sm:justify-center items-center flex sm:shadow-[0_20px_30px_10px_rgba(0,155,240,0.98)] ">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>,
            </div>
        </div>
    </body>
</html>


