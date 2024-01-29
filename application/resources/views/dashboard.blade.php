<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tablero') }} del usuario {{ Auth::user()->rol }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('parciales.success')

                    @if (auth()->user()->hasRole('comercial'))
                        <a href="{{ route('pedidos.pedidoCreate') }}" class="btn btn-primary">Crear Pedido</a>
                        <h3 class="text-lg font-semibold mb-4">Lista de Pedidos</h3>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Fecha de Pedido</th>
                                        <th>Dirección de Envío</th>
                                        <th>Estado del Pedido</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <td>{{ $pedido->id }}</td>
                                            <td>{{ $pedido->idCliente }}</td>
                                            <td>{{ $pedido->fechaPedido }}</td>
                                            <td>{{ $pedido->direccionEnvio }}</td>
                                            <td>{{ $pedido->estadoPedido }}</td>
                                            <td>
                                                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-primary">Modificar</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-black" onclick="return confirm('¿Estás seguro de que deseas eliminar este pedido?')">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @elseif (auth()->user()->hasRole('administrativo') || auth()->user()->hasRole('responsable'))
                        <h3 class="text-lg font-semibold mb-4">Lista de Todos los Pedidos</h3>
                        
                        @include('parciales.success')

                        <a href="{{ route('pedidos.pedidoCreate') }}" class="btn btn-primary">Crear Pedido</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Comercial</th>
                                        <th>Fecha de Pedido</th>
                                        <th>Dirección de Envío</th>
                                        <th>Estado del Pedido</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <td>{{ $pedido->id }}</td>
                                            <td>{{ $pedido->idCliente }}</td>
                                            <td>{{ $pedido->Usuario }}</td>
                                            <td>{{ $pedido->fechaPedido }}</td>
                                            <td>{{ $pedido->direccionEnvio }}</td>
                                            <td>{{ $pedido->estadoPedido }}</td>
                                            <td>
                                                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-primary">Modificar</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-black" onclick="return confirm('¿Estás seguro de que deseas eliminar este pedido?')">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No tienes permiso para ver esta información.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
