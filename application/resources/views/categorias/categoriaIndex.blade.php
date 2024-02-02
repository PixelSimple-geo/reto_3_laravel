<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Categorías') }}
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
                                    <h3 class="text-lg font-semibold">Lista de Categorías</h3>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                @include('parciales.success')
    
                                    <form action="{{ route('categorias.categoriaIndex') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" placeholder="Buscar categoría..." class="form-control" autocomplete="off">
                                            <button type="submit" class="btn btn-primary">Buscar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Crear Categoría</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    @if ($categorias->isEmpty())
                                        <p class="mt-4">No se encontraron resultados para los criterios de búsqueda especificados.</p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Modificar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categorias as $categoria)
                                                        <tr>
                                                            <td>{{ $categoria->id }}</td>
                                                            <td>{{ $categoria->nombreCategoria }}</td>
                                                            <td>
                                                                <a href="{{ route('categorias.categoriaEdit', $categoria->id) }}" class="btn btn-primary">Modificar</a>
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categorias?')">Eliminar</button>
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
