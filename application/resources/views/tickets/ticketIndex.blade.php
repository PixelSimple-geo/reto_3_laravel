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
                    @include('parciales.success')

                    <h3 class="text-lg font-semibold mb-4">Lista de Tickets</h3>

                    <form action="{{ route('tickets.ticketIndex') }}" method="GET" class="mb-4">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <label for="producto" class="form-label">Nombre del Producto:</label>
                                <input type="text" name="producto" id="producto" class="form-control" placeholder="Buscar producto..." value="{{ request('producto') }}">
                            </div>

                            <div class="col-auto">
                                <label for="formato" class="form-label">Formato:</label>
                                <select name="formato" id="formato" class="form-select">
                                    <option value="">Todos los formatos</option>
                                    @foreach($uniqueFormatos as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto align-self-end">
                                <button type="submit" class="btn btn-primary text-black">Buscar</button>
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('tickets.ticketCreate') }}" class="btn btn-primary">Crear Ticket</a>

                    @if ($tickets->isEmpty())
                        <p class="mt-4">No se encontraron tickets.</p>
                    @else
                        {{ $tickets->links() }}
                        <div class="table-responsive">
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
                                            <td>{{ $ticket->idFormatoProducto }} - {{ $ticket->formatoProducto->producto->nombreProducto }} - {{ $ticket->formatoProducto->formatoEnvase }}</td>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
