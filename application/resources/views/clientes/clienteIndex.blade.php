<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">

                    @include('parciales.success')

                    <h3 class="text-lg font-semibold mb-4">Lista de Clientes</h3>

                    <form action="{{ route('clientes.clienteIndex') }}" method="GET" class="mb-4">
                        <div class="flex items-center">
                            <input type="text" name="search" placeholder="Buscar cliente..." class="form-input" autocomplete="off">
                            <button type="submit" class="btn btn-primary ml-2 text-black    ">Buscar</button>
                        </div>
                    </form>

                    <a href="{{ route('clientes.clienteCreate') }}" class="btn btn-primary">Crear Cliente</a>
                    @if ($clientes->isEmpty())
                        <p class="mt-4">No se encontraron resultados para los criterios de búsqueda especificados.</p>
                    @else
                    {{ $clientes->links() }}
                        <div class="table-responsive mt-4">
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
                                                    <button type="submit" class="btn btn-danger text-black" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</button>
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
</x-app-layout>
