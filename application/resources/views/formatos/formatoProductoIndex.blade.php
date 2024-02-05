<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formatos de Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('parciales.success')

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <h3 class="text-lg font-semibold">Lista de Formatos de Producto</h3>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <form action="{{ route('formatos.formatoProductoIndex') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-2 mb-3">
                                                <label for="nombre_producto">Nombre del Producto:</label>
                                                <input type="text" name="nombre_producto" id="nombre_producto" placeholder="Buscar producto..." class="form-control mt-1">
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="formato">Formato:</label>
                                                <select name="formato" id="formato" class="form-select mt-1">
                                                    <option value="">Todos los formatos</option>
                                                    @foreach($uniqueFormatos as $option)
                                                        <option value="{{ $option }}">{{ $option }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="unidades">Unidades:</label>
                                                <input type="text" name="unidades" id="unidades" placeholder="Buscar unidades..." class="form-control mt-1">
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="precio_min">Precio Mínimo:</label>
                                                <input type="number" name="precio_min" id="precio_min" placeholder="Precio mínimo" class="form-control mt-1" min="0">
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="precio_max">Precio Máximo:</label>
                                                <input type="number" name="precio_max" id="precio_max" placeholder="Precio máximo" class="form-control mt-1" min="0">
                                            </div>
                                            <div class="col-md-2 mb-3 d-flex align-items-end">
                                                <button type="submit" class="btn btn-primary mt-3">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <a href="{{ route('formatos.formatoProductoCreate') }}" class="btn btn-primary">Crear Formato de producto</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        @if ($formatosProductos->isEmpty())
                                            <p>No se encontraron resultados para los criterios de búsqueda especificados.</p>
                                        @else
                                            {{ $formatosProductos->links() }}
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
                                                            <td>{{ $formato->idProducto }} - {{ $formato->producto->nombreProducto }}</td>
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
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este formato de producto?')">Eliminar</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
