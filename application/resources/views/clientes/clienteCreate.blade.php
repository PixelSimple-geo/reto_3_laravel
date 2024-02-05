<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('clientes.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="codigoCliente" class="form-label">Código:</label>
                                    <input type="text" name="codigoCliente" id="codigoCliente" class="form-control" value="{{ $codigoCliente }}" readonly>
                                </div>

                                <div class="mb-4">
                                    <label for="nombreCliente" class="form-label">Nombre:</label>
                                    <input type="text" name="nombreCliente" id="nombreCliente" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="apellidoCliente" class="form-label">Apellido:</label>
                                    <input type="text" name="apellidoCliente" id="apellidoCliente" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="correoCliente" class="form-label">Correo:</label>
                                    <input type="email" name="correoCliente" id="correoCliente" class="form-control" required>
                                </div>

                                <div class="mb-3 d-flex flex-column flex-md-row justify-content-md-between">
                                        <button type="submit" class="btn btn-primary">{{ __('Crear Cliente') }}</button>
                                        <a href="{{ route('clientes.clienteIndex') }}" class="btn btn-secondary">{{ __('Volver a los Clientes') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    