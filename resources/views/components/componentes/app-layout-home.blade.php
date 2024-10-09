@props(['titulo'])
@php
$titulo = $titulo ?? 'Sin Titulo';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$titulo}}</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Cargar Livewire -->
    @livewireStyles
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="" id="dark-mode">

    <x-componentes.nav-home></x-componentes.nav-home>

    <x-componentes.aside-home></x-componentes.aside-home>

    <div class="p-4 pt-20 sm:ml-64 dark:bg-[#466EAB]">
        {{ $slot }}
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>