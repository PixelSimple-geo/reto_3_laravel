<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría:</label>
                            <select name="idCategoria" id="categoria_id" class="form-select mt-1 block w-full">
                                <option value="" disabled>Selecciona una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" @if($categoria->id == $producto->idCategoria) selected @endif>{{ $categoria->nombreCategoria }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                            <input type="text" name="nombreProducto" id="nombre" class="form-input mt-1 block w-full" value="{{ $producto->nombreProducto }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
                            <textarea name="descripcionProducto" id="descripcion" class="form-textarea mt-1 block w-full" rows="3" required>{{ $producto->descripcionProducto }}</textarea>
                        </div>

                        @if ($producto->fotoURL)
                            <img src="{{ asset('/storage/' . $producto->fotoURL) }}" alt="Imagen actual del producto" class="img-fluid" style="width: 20rem;">
                        @else
                            <span class="block mt-2 text-gray-500">No hay imagen disponible</span>
                        @endif

                        <label for="imagen" class="block text-sm font-medium text-gray-700 mt-4">Nueva imagen:</label>
                        <input type="file" name="imagen" id="imagen" class="form-input mt-1 block w-full" accept="image/*">

                        <br>

                        <input type="hidden" name="imagen_actual" value="{{ $producto->fotoURL }}"> 

                        <div class="mb-3 d-flex flex-column flex-md-row justify-content-md-between">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar Cambios') }}</button>
                            <a href="{{ route('productos.productoIndex') }}" class="btn btn-secondary">{{ __('Volver a los Productos') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
