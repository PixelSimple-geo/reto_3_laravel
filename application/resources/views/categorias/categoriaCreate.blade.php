<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Categoría') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('categorias.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="nombreCategoria" class="form-label">Nombre:</label>
                                    <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control" required>
                                </div>

                                <div class="mb-3 d-flex flex-column flex-md-row justify-content-md-between">
                                    <button type="submit" class="btn btn-primary">{{ __('Crear Categoría') }}</button>
                                    <a href="{{ route('categorias.categoriaIndex') }}" class="btn btn-secondary">{{ __('Volver a las Categorías') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>