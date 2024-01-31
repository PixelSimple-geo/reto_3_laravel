<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pedidos') }} del usuario {{ Auth::user()->rol }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mt-4">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Lista de Pedidos</h3>
                            
                            @include('parciales.success')

                            <form action="{{ route('dashboard') }}" method="GET" class="row g-3 align-items-center">
                                <div class="col-md-3 mb-2">
                                    <label for="cliente" class="form-label">Cliente:</label>
                                    <select name="cliente" id="cliente" class="form-select">
                                        <option value="">Todos los clientes</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}" {{ request('cliente') == $cliente->id ? 'selected' : '' }}>
                                                {{ $cliente->nombreCliente }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label for="estado" class="form-label">Estado:</label>
                                    <select name="estado" id="estado" class="form-select">
                                        <option value="">Todos los estados</option>
                                        <option value="Solicitado" {{ request('estado') == 'Solicitado' ? 'selected' : '' }}>Solicitado</option>
                                        <option value="En preparación" {{ request('estado') == 'En preparación' ? 'selected' : '' }}>En preparación</option>
                                        <option value="En entrega" {{ request('estado') == 'En entrega' ? 'selected' : '' }}>En entrega</option>
                                        <option value="Entregado" {{ request('estado') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2 d-flex align-self-end">
                                    <button type="submit" class="btn btn-primary text-black">Filtrar</button>
                                    <button type="reset" class="btn btn-secondary ms-2 text-black">Resetear</button>
                                </div>
                            </form>
                        </div>
                        @if (auth()->check())
                        <a href="{{ route('pedidos.pedidoCreate') }}" class="btn btn-primary">Crear Pedido</a>
                        @if ($pedidos->isEmpty())
                            <p>No hay resultados para sus criterios de búsqueda.</p>
                        @else
                        {{ $pedidos->links() }}
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
                                                <td>{{ $pedido->idCliente }} {{ $pedido->cliente->nombreCliente }} {{ $pedido->cliente->apellidoCliente }}</td>
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
                            @endif
                        @else
                            <p>No tienes permiso para ver esta información.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
