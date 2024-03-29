<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('home.svg') }}" alt="Descripción de la imagen">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 md:-my-px md:ms-10 md:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="no-underline">
                        {{ __('Pedidos') }}
                    </x-nav-link>

                    <x-nav-link :href="route('tickets.ticketIndex')" :active="request()->routeIs('tickets.ticketIndex')" class="no-underline">
                        {{ __('Tickets') }}
                    </x-nav-link>

                    @if (Auth::user()->rol === 'administrativo' || Auth::user()->rol === 'responsable')
                        <x-nav-link :href="route('clientes.clienteIndex')" :active="request()->routeIs('clientes.clienteIndex')" class="no-underline">
                            {{ __('Clientes') }}
                        </x-nav-link>

                        <x-nav-link :href="route('productos.productoIndex')" :active="request()->routeIs('productos.productoIndex')" class="no-underline">
                            {{ __('Catálogo de Productos') }}
                        </x-nav-link>

                        <x-nav-link :href="route('formatos.formatoProductoIndex')" :active="request()->routeIs('formatos.formatoProductoIndex')" class="no-underline">
                            {{ __('Formatos de producto') }}
                        </x-nav-link>
                        
                        <x-nav-link :href="route('categorias.categoriaIndex')" :active="request()->routeIs('categorias.categoriaIndex')" class="no-underline">
                            {{ __('Categorías') }}
                        </x-nav-link>

                        <x-nav-link :href="route('usuarios.usuarioIndex')" :active="request()->routeIs('usuarios.usuarioIndex')" class="no-underline">
                            {{ __('Usuarios') }}
                        </x-nav-link>
                    @endif

                    @if (Auth::user()->rol === 'responsable')
                        <x-nav-link :href="route('estadisticas')" :active="request()->routeIs('estadisticas')" class="no-underline">
                            {{ __('Estadísticas') }}
                        </x-nav-link>
                    @endif
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex md:items-center md:ms-6"> 
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="no-underline">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="no-underline">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500  hover:bg-gray-100  focus:outline-none focus:bg-gray-100 focus:text-gray-500  transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="no-underline">
                {{ __('Pedidos') }}
            </x-responsive-nav-link>
            @if (Auth::user()->rol === 'administrativo' || Auth::user()->rol === 'responsable')
                <x-responsive-nav-link :href="route('clientes.clienteIndex')" :active="request()->routeIs('clientes.index')" class="no-underline">
                    {{ __('Clientes') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('productos.productoIndex')" :active="request()->routeIs('productos.catalogo')" class="no-underline">
                    {{ __('Catálogo de Productos') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('formatos.formatoProductoIndex')" :active="request()->routeIs('formatos.index')" class="no-underline">
                    {{ __('Formatos de producto') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('tickets.ticketIndex')" :active="request()->routeIs('tickets.ticketIndex')" class="no-underline">
                    {{ __('Tickets') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('categorias.categoriaIndex')" :active="request()->routeIs('categorias.categoriaIndex')" class="no-underline">
                    {{ __('Categorías') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('usuarios.usuarioIndex')" :active="request()->routeIs('usuarios.usuarioIndex')" class="no-underline">
                    {{ __('Usuarios') }}
                </x-responsive-nav-link>
            @endif

            @if (Auth::user()->rol === 'responsable')
                <x-responsive-nav-link :href="route('estadisticas')" :active="request()->routeIs('estadisticas')" class="no-underline">
                    {{ __('Estadísticas') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="no-underline">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="no-underline">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

    
</nav>