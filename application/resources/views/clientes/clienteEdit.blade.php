<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-600">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nombreCliente" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                            <input type="text" name="nombreCliente" id="nombreCliente" class="form-input mt-1 block w-full" value="{{ $cliente->nombreCliente }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="apellidoCliente" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido:</label>
                            <input type="text" name="apellidoCliente" id="apellidoCliente" class="form-input mt-1 block w-full" value="{{ $cliente->apellidoCliente }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="correoCliente" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo:</label>
                            <input type="email" name="correoCliente" id="correoCliente" class="form-input mt-1 block w-full" value="{{ $cliente->correoCliente }}" required>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary text-black">{{ __('Modificar Cliente') }}</button>
                            </div>

                            <div class="form-group">
                                <a href="{{ route('clientes.clienteIndex') }}" class="btn btn-secondary">{{ __('Volver a los ClientesSeeder') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
