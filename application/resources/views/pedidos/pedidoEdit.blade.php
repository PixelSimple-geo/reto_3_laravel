<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <!-- Formulario para editar el pedido -->
                    <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Cliente -->
                        <div class="mb-4">
                            <label for="cliente" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente:</label>
                            <select name="idCliente" id="cliente" class="form-select mt-1 block w-full">
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ $cliente->id == $pedido->idCliente ? 'selected' : '' }}>{{ $cliente->nombreCliente }} {{ $cliente->apellidoCliente }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Fecha -->
                        <div class="mb-4">
                            <label for="fecha" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" class="form-input mt-1 block w-full" value="{{ $pedido->fechaPedido }}" required>
                        </div>

                        <!-- Dirección -->
                        <div class="mb-4">
                            <label for="direccion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dirección:</label>
                            <input type="text" name="direccion" id="direccion" class="form-input mt-1 block w-full" value="{{ $pedido->direccionEnvio }}" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado:</label>
                            <select name="estado" id="estado" class="form-select mt-1 block w-full">
                                <option value="solicitado" {{ $pedido->estadoPedido == 'solicitado' ? 'selected' : '' }}>Solicitado</option>
                                <option value="en preparación" {{ $pedido->estadoPedido == 'en preparación' ? 'selected' : '' }}>En preparación</option>
                                <option value="en entrega" {{ $pedido->estadoPedido == 'en entrega' ? 'selected' : '' }}>En entrega</option>
                                <option value="entregado" {{ $pedido->estadoPedido == 'entregado' ? 'selected' : '' }}>Entregado</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <!-- Botón de envío -->
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary text-black">{{ __('Modificar Pedido') }}</button>
                            </div>

                            <!-- Botón para volver al dashboard -->
                            <div class="form-group">
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">{{ __('Volver al Tablero') }}</a>
                            </div>
                        </div>
                       

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
