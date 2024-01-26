<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cliente1 = Cliente::first();
        $cliente2 = Cliente::find(2);
        $user1 = User::first();
        $user2 = User::find(2);

        Pedido::create([
            'idCliente' => $cliente1->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '123 Main St',
            'estadoPedido' => 'Pending',
        ]);

        Pedido::create([
            'idCliente' => $cliente2->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '456 Second St',
            'estadoPedido' => 'Processing',
        ]);

        Pedido::create([
            'idCliente' => $cliente1->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '789 Third St',
            'estadoPedido' => 'Delivered',
        ]);
    }
}
