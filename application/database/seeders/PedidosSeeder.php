<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Database\Seeder;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cliente1 = Cliente::where('nombreCliente', 'John')->first();
        $cliente2 = Cliente::where('nombreCliente', 'Jane')->first();
        $cliente3 = Cliente::where('nombreCliente', 'Alice')->first();

        $user1 = User::where('name', 'yalero')->first();
        $user2 = User::where('name', 'jorge')->first();

        Pedido::create([
            'idCliente' => $cliente1->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '123 Main St',
            'estadoPedido' => 'Solicitado',
        ]);

        Pedido::create([
            'idCliente' => $cliente2->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '456 Second St',
            'estadoPedido' => 'En preparación',
        ]);

        Pedido::create([
            'idCliente' => $cliente3->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '789 Third St',
            'estadoPedido' => 'En entrega',
        ]);
    }
}
