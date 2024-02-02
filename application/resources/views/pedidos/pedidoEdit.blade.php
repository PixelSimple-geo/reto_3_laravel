<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="cliente" class="form-label">{{ __('Cliente:') }}</label>
                                    <select name="idCliente" id="cliente" class="form-select">
                                        @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id }}" {{ $cliente->id == $pedido->idCliente ? 'selected' : '' }}>{{ $cliente->nombreCliente }} {{ $cliente->apellidoCliente }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="fecha" class="form-label">{{ __('Fecha:') }}</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $pedido->fechaPedido }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="direccion" class="form-label">{{ __('Dirección:') }}</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $pedido->direccionEnvio }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="estado" class="form-label">{{ __('Estado:') }}</label>
                                    <select name="estado" id="estado" class="form-select">
                                        <option value="solicitado" {{ $pedido->estadoPedido == 'solicitado' ? 'selected' : '' }}>Solicitado</option>
                                        <option value="en preparación" {{ $pedido->estadoPedido == 'en preparación' ? 'selected' : '' }}>En preparación</option>
                                        <option value="en entrega" {{ $pedido->estadoPedido == 'en entrega' ? 'selected' : '' }}>En entrega</option>
                                        <option value="entregado" {{ $pedido->estadoPedido == 'entregado' ? 'selected' : '' }}>Entregado</option>
                                    </select>
                                </div>

                                <div class="mb-3 d-flex flex-column flex-md-row justify-content-md-between">
                                    <button type="submit" class="btn btn-primary">{{ __('Modificar Pedido') }}</button>
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
