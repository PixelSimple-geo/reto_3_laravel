<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Formulario para crear un nuevo pedido') }}</div>

                        <div class="card-body">
                            <!-- Formulario para crear un nuevo pedido -->
                            <form method="POST" action="{{ route('pedidos.store') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Cliente -->
                                <div class="form-group">
                                    <label for="cliente">{{ __('Cliente:') }}</label>
                                    <select name="idCliente" id="cliente" class="form-control">
                                        <option value="" disabled selected>-- Escoja cliente --</option>
                                        @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nombreCliente }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Fecha -->
                                <div class="form-group">
                                    <label for="fecha">{{ __('Fecha:') }}</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                                </div>

                                <!-- Dirección -->
                                <div class="form-group">
                                    <label for="direccion">{{ __('Dirección:') }}</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                                </div>

                                <!-- Estado -->
                                <div class="form-group mb-4">
                                    <label for="estado">{{ __('Estado:') }}</label>
                                    <select name="estado" id="estado" class="form-control">
                                        <option value="solicitado">Solicitado</option>
                                        <option value="en preparación">En preparación</option>
                                        <option value="en entrega">En entrega</option>
                                        <option value="entregado">Entregado</option>
                                    </select>
                                </div>

                                <div class="form-group d-flex justify-content-between">
                                    <!-- Botón de envío -->
                                    <div class="form-group mb-4">
                                        <button type="submit" class="btn btn-primary text-black">{{ __('Crear Pedido') }}</button>
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
        </div>
    </div>
</x-app-layout>
