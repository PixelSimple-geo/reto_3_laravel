<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4">
                                    <label for="categoria_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría:</label>
                                    <select name="idCategoria" id="categoria_id" class="form-select mt-1 block w-full">
                                        <option value="" disabled selected>Selecciona una categoría</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombreCategoria }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                                    <input type="text" name="nombreProducto" id="nombre" class="form-input mt-1 block w-full" required>
                                </div>

                                <div class="mb-4">
                                    <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción:</label>
                                    <textarea name="descripcionProducto" id="descripcion" class="form-textarea mt-1 block w-full" rows="3" required></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen:</label>
                                    <input type="file" name="imagen" id="imagen" class="form-input mt-1 block w-full" accept="image/*">
                                </div>                       

                                <div class="mb-3 d-flex flex-column flex-md-row justify-content-md-between">
                                    <button type="submit" class="btn btn-primary">{{ __('Crear Producto') }}</button>
                                    <a href="{{ route('productos.productoIndex') }}" class="btn btn-secondary">{{ __('Volver a los Productos') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
