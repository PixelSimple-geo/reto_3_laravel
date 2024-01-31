<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Catálogo de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @include('parciales.success')

                    <h3 class="text-lg font-semibold mb-4">Lista de Productos</h3>

                    <form action="{{ route('productos.productoIndex') }}" method="GET" class="mb-4">
                        <div class="flex items-center">
                            <input type="text" name="search" placeholder="Buscar producto..." class="form-input" autocomplete="off">
                            <button type="submit" class="btn btn-primary ml-2 text-black">Buscar</button>
                        </div>
                    </form>

                    <a href="{{ route('productos.productoCreate') }}" class="btn btn-primary">Crear Producto</a>
                    @if ($productos->isEmpty())
                        <p class="mt-4">No se encontraron resultados para los criterios de búsqueda especificados.</p>
                    @else
                    {{ $productos->links() }}
                        <div class="table-responsive mt-4">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Categoría</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Imagen</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->categoria->nombreCategoria }}</td>
                                        <td>{{ $producto->nombreProducto }}</td>
                                        <td>{{ $producto->descripcionProducto }}</td>
                                        <td>
                                            <a href="{{ asset('/storage/' . $producto->fotoURL) }}" target="_blank"><img src="{{ asset('/storage/' . $producto->fotoURL) }}" alt="Imagen del producto" style="max-width: 3rem; max-height: 3rem;"></a> 
                                        </td>
                                        <td>
                                            <a href="{{ route('productos.productoEdit', $producto->id) }}" class="btn btn-primary">Modificar</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-black" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
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
