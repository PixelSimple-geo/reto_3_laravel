<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Usuarios') }}
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
                                    <h3 class="text-lg font-semibold">Lista de Usuarios</h3>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <form action="{{ route('usuarios.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" placeholder="Buscar usuario..." class="form-control" autocomplete="off">
                                            <button type="submit" class="btn btn-primary">Buscar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear Usuario</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    @if ($usuarios->isEmpty())
                                        <p class="mt-4">No se encontraron resultados para los criterios de búsqueda especificados.</p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Email</th>
                                                        <th>Rol</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($usuarios as $usuario)
                                                        <tr>
                                                            <td>{{ $usuario->id }}</td>
                                                            <td>{{ $usuario->name }}</td>
                                                            <td>{{ $usuario->email }}</td>
                                                            <td>{{ $usuario->rol }}</td>
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
