<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-600">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('tickets.ticketUpdate', ['idPedido' => $ticket->idPedido, 'idFormatoProducto' => $ticket->idFormatoProducto]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campos de edición -->
                        <div class="mb-4">
                            <label for="idPedido" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID Pedido:</label>
                            <input type="text" name="idPedido" id="idPedido" class="form-input mt-1 block w-full" value="{{ $ticket->idPedido }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="idFormatoProducto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID Formato Producto:</label>
                            <input type="text" name="idFormatoProducto" id="idFormatoProducto" class="form-input mt-1 block w-full" value="{{ $ticket->idFormatoProducto }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label for="unidades" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Unidades:</label>
                            <input type="number" name="unidades" id="unidades" class="form-input mt-1 block w-full" value="{{ $ticket->unidades }}" min="1" required>
                        </div>

                        <div class="mb-3 d-flex flex-column flex-md-row justify-content-md-between">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar Cambios') }}</button>
                            <a href="{{ route('tickets.ticketIndex') }}" class="btn btn-secondary">{{ __('Volver al Listado') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
