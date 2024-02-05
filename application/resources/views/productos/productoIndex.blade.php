<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catálogo de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col">
                                    <h3 class="text-lg font-semibold">Lista de Productos</h3>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                @include('parciales.success')

                                    <form action="{{ route('productos.productoIndex') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" placeholder="Buscar producto..." class="form-control" autocomplete="off">
                                            <button type="submit" class="btn btn-primary">Buscar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <a href="{{ route('productos.productoCreate') }}" class="btn btn-primary">Crear Producto</a>
                                </div>
                            </div>

                            @if ($productos->isEmpty())
                                <div class="row">
                                    <div class="col">
                                        <p class="mt-4">No se encontraron resultados para los criterios de búsqueda especificados.</p>
                                    </div>
                                </div>
                            @else
                                <div class="row mb-4">
                                    <div class="col">
                                        {{ $productos->links() }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
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
                                                            @if ($producto->fotoURL)
                                                                <a href="{{ asset('/storage/' . $producto->fotoURL) }}" target="_blank">
                                                                    <img src="{{ asset('/storage/' . $producto->fotoURL) }}" alt="Imagen del producto" style="max-width: 3rem; max-height: 3rem;">
                                                                </a>
                                                            @else
                                                                <span>Imagen no disponible</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('productos.productoEdit', $producto->id) }}" class="btn btn-primary">Modificar</a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
