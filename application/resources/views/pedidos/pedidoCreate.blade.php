<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <!-- Formulario para crear un nuevo pedido -->
                    <form method="POST" action="{{ route('pedidos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Cliente -->
                        <div class="mb-4">
                            <label for="cliente" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente:</label>
                            <select name="clientes_id" id="cliente" class="form-select mt-1 block w-full">
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fecha -->
                        <div class="mb-4">
                            <label for="fecha" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" class="form-input mt-1 block w-full" required>
                        </div>

                        <!-- Dirección -->
                        <div class="mb-4">
                            <label for="direccion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dirección:</label>
                            <input type="text" name="direccion" id="direccion" class="form-input mt-1 block w-full" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado:</label>
                            <select name="estado" id="estado" class="form-select mt-1 block w-full">
                                <option value="solicitado">Solicitado</option>
                                <option value="en preparación">En preparación</option>
                                <option value="en entrega">En entrega</option>
                                <option value="entregado">Entregado</option>
                            </select>
                        </div>

                        <!-- Foto -->
                        <div class="mb-4">
                            <label for="foto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto:</label>
                            <input type="file" name="foto" id="foto" class="form-input mt-1 block w-full">
                        </div>

                        <!-- Botón de envío -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Pedido</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
