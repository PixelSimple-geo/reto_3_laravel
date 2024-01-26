<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Tickets') }}
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

                    <a href="{{ route('tickets.ticketCreate') }}" class="btn btn-primary">Crear Ticket</a>
                    <h3 class="text-lg font-semibold mb-4">Lista de Tickets</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Pedido</th>
                                <th>ID Formato Producto</th>
                                <th>Unidades</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->idPedido }}</td>
                                    <td>{{ $ticket->idFormatoProducto }}</td>
                                    <td>{{ $ticket->unidades }}</td>
                                    <td>
                                        <a href="{{ route('tickets.ticketEdit', ['idPedido' => $ticket->idPedido, 'idFormatoProducto' => $ticket->idFormatoProducto]) }}" class="btn btn-primary">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('tickets.ticketDestroy', [$ticket->idPedido, $ticket->idFormatoProducto]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-black" onclick="return confirm('¿Estás seguro de que deseas eliminar este ticket?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
