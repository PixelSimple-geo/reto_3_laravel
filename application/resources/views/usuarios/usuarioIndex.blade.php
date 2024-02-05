<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
                                    @include('parciales.success')

                                    <form action="{{ route('usuarios.usuarioIndex') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Buscar usuario..." class="form-control" autocomplete="off">
                                            <button type="submit" class="btn btn-primary">Buscar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{ $usuarios->links() }}
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
                                                        <th>Modificar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($usuarios as $usuario)
                                                        <tr>
                                                            <td>{{ $usuario->id }}</td>
                                                            <td>{{ $usuario->name }}</td>
                                                            <td>{{ $usuario->email }}</td>
                                                            <td>{{ $usuario->rol }}</td>
                                                            <td>
                                                                <a href="{{ route('usuarios.usuarioEdit', $usuario->id) }}" class="btn btn-primary">Modificar</a>
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
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
