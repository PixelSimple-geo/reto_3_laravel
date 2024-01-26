<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formatos de Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-600">
                    <a href="{{ route('formatos.formatoProductoCreate') }}" class="btn btn-primary">Crear Formato de producto</a>
                    <h3 class="text-lg font-semibold mb-4">Lista de Formatos de Producto</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID del Producto</th>
                                    <th>Formato de Envase</th>
                                    <th>Unidades</th>
                                    <th>Precio Unitario</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formatosProductos as $formato)
                                    <tr>
                                        <td>{{ $formato->id }}</td>
                                        <td>{{ $formato->idProducto }}</td>
                                        <td>{{ $formato->formatoEnvase }}</td>
                                        <td>{{ $formato->unidades }}</td>
                                        <td>{{ $formato->precioUnitario }}</td>
                                        <td>
                                            <a href="{{ route('formatos.formatoProductoEdit', $formato->id) }}" class="btn btn-primary">Modificar</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('formatoProductos.destroy', $formato->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-black" onclick="return confirm('¿Estás seguro de que deseas eliminar este formato de producto?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
