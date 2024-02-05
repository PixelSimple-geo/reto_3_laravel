<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="name" class="form-label">{{ __('Nombre') }}:</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $usuario->name }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label">{{ __('Correo Electrónico') }}:</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $usuario->email }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="rol" class="form-label">{{ __('Rol') }}:</label>
                                    <select name="rol" id="rol" class="form-select" required>
                                        <option value="comercial" @if($usuario->rol === 'comercial') selected @endif>Comercial</option>
                                        <option value="administrativo" @if($usuario->rol === 'administrativo') selected @endif>Administrativo</option>
                                        <option value="responsable" @if($usuario->rol === 'responsable') selected @endif>Responsable</option>
                                    </select>
                                </div>

                                <div class="mb-3 d-flex flex-column flex-md-row justify-content-md-between">
                                    <button type="submit" class="btn btn-primary">{{ __('Guardar Cambios') }}</button>
                                    <a href="{{ route('usuarios.usuarioIndex') }}" class="btn btn-secondary">{{ __('Volver a Usuarios') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
