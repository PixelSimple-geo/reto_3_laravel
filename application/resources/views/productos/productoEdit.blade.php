<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <!-- Formulario para editar el producto -->
                    <form method="POST" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Categoría -->
                        <div class="mb-4">
                            <label for="categoria_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría:</label>
                            <select name="idCategoria" id="categoria_id" class="form-select mt-1 block w-full">
                                <option value="" disabled>Selecciona una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" @if($categoria->id == $producto->idCategoria) selected @endif>{{ $categoria->nombreCategoria }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                            <input type="text" name="nombreProducto" id="nombre" class="form-input mt-1 block w-full" value="{{ $producto->nombreProducto }}" required>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción:</label>
                            <textarea name="descripcionProducto" id="descripcion" class="form-textarea mt-1 block w-full" rows="3" required>{{ $producto->descripcionProducto    }}</textarea>
                        </div>

                        <!-- Imagen actual -->
                        @if ($producto->fotoURL)
                            <img src="{{ asset('/storage/' . $producto->fotoURL) }}" alt="Imagen actual del producto" style="max-width: 300px; height: auto;">
                        @else
                            <span class="block mt-2 text-gray-500 dark:text-gray-400">No hay imagen disponible</span>
                        @endif

                        <!-- Campo de carga de nueva imagen -->
                        <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Nueva imagen:</label>
                        <input type="file" name="imagen" id="imagen" class="form-input mt-1 block w-full" accept="image/*">

                        <br>

                        <!-- Campo oculto para mantener la imagen actual si no se proporciona una nueva -->
                        <input type="hidden" name="imagen_actual" value="{{ $producto->fotoURL }}"> 

                        <!-- Botones de acción -->
                        <div class="form-group d-flex justify-content-between">
                            <!-- Botón de envío -->
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary text-black">{{ __('Guardar Cambios') }}</button>
                            </div>

                            <!-- Botón para volver -->
                            <div class="form-group">
                                <a href="{{ route('productos.productoIndex') }}" class="btn btn-secondary">{{ __('Volver a los Productos') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
