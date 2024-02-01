<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">

    <!-- Custom CSS -->
    <style>
        body {
            min-height: 100vh;
            position: relative;
            margin: 0;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 4rem;
            background-color: #f8f9fa;
            margin-bottom: 1rem;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased bg-light">
    <div class="container-fluid bg-light">
        <!-- Navigation -->
        <div class="row">
            <div class="col">
                @include('layouts.navigation')
            </div>
        </div>

        <!-- Page Heading -->
        @if (isset($header))
            <div class="row">
                <div class="col">
                    <header class="bg-white shadow">
                        <div class="container py-4">
                            {{ $header }}
                        </div>
                    </header>
                </div>
            </div>
        @endif

        <!-- Page Content -->
        <div class="row">
            <div class="col">
                <main class="container py-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4 text-center">
        <div class="container">
            <p class="text-sm text-muted">© {{ date('Y') }} PixelSimple.geo. Todos los derechos reservados.</p>
            <p class="text-sm text-muted">Teléfono de contacto: +420666922</p>
        </div>
    </footer>
</body>
</html>
