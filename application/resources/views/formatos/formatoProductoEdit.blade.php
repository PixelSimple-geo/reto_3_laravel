<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Formato de Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-600">
                    <form action="{{ route('formatoProductos.update', $formatoProducto->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campos de edición -->
                        <div class="mb-4">
                            <label for="formatoEnvase" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Formato de Envase:</label>
                            <input type="text" name="formatoEnvase" id="formatoEnvase" class="form-input mt-1 block w-full" value="{{ $formatoProducto->formatoEnvase }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="unidades" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Unidades:</label>
                            <input type="number" name="unidades" id="unidades" class="form-input mt-1 block w-full" value="{{ $formatoProducto->unidades }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="precioUnitario" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio Unitario:</label>
                            <input type="number" name="precioUnitario" id="precioUnitario" class="form-input mt-1 block w-full" value="{{ $formatoProducto->precioUnitario }}" required>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <!-- Botón de envío -->
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary text-black">{{ __('Guardar Cambios') }}</button>
                            </div>

                            <!-- Botón para volver -->
                            <div class="form-group">
                                <a href="{{ route('formatos.formatoProductoIndex') }}" class="btn btn-secondary">{{ __('Volver al Listado') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
