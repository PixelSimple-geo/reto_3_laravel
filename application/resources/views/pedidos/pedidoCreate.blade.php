<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
                            <form method="POST" action="{{ route('pedidos.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 form-group">
                                    <label for="cliente" class="form-label">{{ __('Cliente:') }}</label>
                                    <select name="idCliente" id="cliente" class="form-select">
                                        <option value="" disabled selected>-- Escoja cliente --</option>
                                        @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nombreCliente }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="fecha" class="form-label">{{ __('Fecha:') }}</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="direccion" class="form-label">{{ __('Dirección:') }}</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="estado" class="form-label">{{ __('Estado:') }}</label>
                                    <select name="estado" id="estado" class="form-select">
                                        <option value="solicitado">Solicitado</option>
                                        <option value="en preparación">En preparación</option>
                                        <option value="en entrega">En entrega</option>
                                        <option value="entregado">Entregado</option>
                                    </select>
                                </div>

                                <div class="mb-3 d-flex flex-column flex-md-row justify-content-md-between">
                                        <button type="submit" class="btn btn-primary">{{ __('Crear Pedido') }}</button>
                                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">{{ __('Volver al Tablero') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
