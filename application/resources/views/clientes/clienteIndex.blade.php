<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <h3 class="text-lg font-semibold">Lista de Clientes</h3>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    @include('parciales.success')

                                    <form action="{{ route('clientes.clienteIndex') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" placeholder="Buscar cliente..." class="form-control" autocomplete="off">
                                            <button type="submit" class="btn btn-primary">Buscar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <a href="{{ route('clientes.clienteCreate') }}" class="btn btn-primary">Crear Cliente</a>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    @if ($clientes->isEmpty())
                                        <p class="mt-4">No se encontraron resultados para los criterios de búsqueda especificados.</p>
                                    @else
                                        {{ $clientes->links() }}
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    @if (!$clientes->isEmpty())
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Email</th>
                                                        <th>Modificar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clientes as $cliente)
                                                        <tr>
                                                            <td>{{ $cliente->id }}</td>
                                                            <td>{{ $cliente->nombreCliente }}</td>
                                                            <td>{{ $cliente->apellidoCliente }}</td>
                                                            <td>{{ $cliente->correoCliente }}</td>
                                                            <td>
                                                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary">Modificar</a>
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
