<!-- layout.blade.php -->
<html>
<head>
    @yield("head")
</head>
<body>
<header>
    <div>
        <img src="{{ asset('images/killer.png') }}" alt="Logo">
    </div>

    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Quienes Somos</a></li>
            <li><a href="#">Contacto</a></li>
            
            @auth
                @foreach(auth()->user()->authorities as $authority)
                    @if($authority->rol == 'comercial')
                        <li><a href="#">Comerciales Link</a></li>
                    @elseif($authority->rol == 'administrativo')
                        <li><a href="#">Administrativos Link</a></li>
                    @elseif($authority->rol == 'responsable')
                        <li><a href="#">Responsables Link</a></li>
                    @endif
                @endforeach

                <li><a href="{{ url('/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Perfil</a></li>
            @else
                <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                @endif
            @endauth

        </ul>
    </nav>
</header>
@yield("main")
<footer>
    <h1>Este es el footer</h1>
</footer>
</body>
</html>
