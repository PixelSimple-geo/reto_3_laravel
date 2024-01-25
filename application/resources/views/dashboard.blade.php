<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tablero') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Botones para el comercial -->
                    <div class="flex justify-center mb-4">
                        <a href="{{ route('pedidos.create') }}" class="mr-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Crear Pedido
                        </a>
                    </div>

                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Fecha</th>
                                <th class="px-4 py-2">Estado</th>
                                <!-- Agregar más columnas si es necesario -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                                <tr>
                                    
                                    <!-- Agregar más columnas si es necesario -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
