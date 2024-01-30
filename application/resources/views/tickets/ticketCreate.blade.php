<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-600">
                    <form action="{{ route('tickets.ticketStore') }}" method="POST">
                        @csrf

                       <div class="mb-4">
                            <label for="idPedido" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID Pedido:</label>
                            <select name="idPedido" id="idPedido" class="form-select mt-1 block w-full" required>
                                <option value="" disabled selected>Selecciona un Pedido</option>
                                @foreach($pedidos as $pedido)
                                    <option value="{{ $pedido->id }}">{{ $pedido->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="idFormatoProducto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID Formato Producto:</label>
                            <select name="idFormatoProducto" id="idFormatoProducto" class="form-select mt-1 block w-full" required>
                                <option value="" disabled selected>Selecciona un Formato de Producto</option>
                                @foreach($formatosProducto as $formatoProducto)
                                <option value="{{ $formatoProducto->id }}">{{ $formatoProducto->id }} | {{ $formatoProducto->producto->nombreProducto }} - {{ $formatoProducto->formatoEnvase }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="unidades" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Unidades:</label>
                            <input type="number" name="unidades" id="unidades" class="form-input mt-1 block w-full" required>
                        </div>

                        <!-- Botones de acción -->
                        <div class="form-group d-flex justify-content-between">
                            <!-- Botón de envío -->
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary text-black">{{ __('Crear Ticket') }}</button>
                            </div>

                            <!-- Botón para volver -->
                            <div class="form-group">
                                <a href="{{ route('tickets.ticketIndex') }}" class="btn btn-secondary">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
