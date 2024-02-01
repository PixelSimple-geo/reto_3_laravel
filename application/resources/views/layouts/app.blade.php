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

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Template -->
        <style>
            #template {
                display: grid;
                grid-template-rows: auto auto 1fr auto;
                min-height: 100vh;
            }
        </style>

    </head>
    <body class="font-sans antialiased ">
        <div class="bg-gray-100 dark:bg-gray-900" id=template>
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="bg-gray-200 dark:bg-gray-900 py-4 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">© {{ date('Y') }} PixelSimple.geo. Todos los derechos reservados.</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Teléfono de contacto: +420666922</p>
            </footer>   

        </div>
    </body>
</html>
