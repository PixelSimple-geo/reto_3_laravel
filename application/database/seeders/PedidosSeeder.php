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
        $cliente3 = Cliente::where('nombreCliente', 'Oribe')->first();
        $cliente4 = Cliente::where('nombreCliente', 'Bob')->first();
        $cliente5 = Cliente::where('nombreCliente', 'Emily')->first();
        $cliente6 = Cliente::where('nombreCliente', 'Michael')->first();
        $cliente7 = Cliente::where('nombreCliente', 'Sophia')->first();
        $cliente8 = Cliente::where('nombreCliente', 'Yalero')->first();
        $cliente9 = Cliente::where('nombreCliente', 'Olivia')->first();
        $cliente10 = Cliente::where('nombreCliente', 'James')->first();
        $cliente11 = Cliente::where('nombreCliente', 'Sophie')->first();
        $cliente12 = Cliente::where('nombreCliente', 'Ethan')->first();
        $cliente13 = Cliente::where('nombreCliente', 'Isabella')->first();
        $cliente14 = Cliente::where('nombreCliente', 'Alexander')->first();
        $cliente15 = Cliente::where('nombreCliente', 'Charlotte')->first();


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

        Pedido::create([
            'idCliente' => $cliente4->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '321 Fourth St',
            'estadoPedido' => 'Solicitado',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente5->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '654 Fifth St',
            'estadoPedido' => 'En preparación',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente6->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '987 Sixth St',
            'estadoPedido' => 'En entrega',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente7->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '753 Seventh St',
            'estadoPedido' => 'Solicitado',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente8->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '159 Eighth St',
            'estadoPedido' => 'En preparación',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente9->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '246 Ninth St',
            'estadoPedido' => 'En entrega',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente10->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '951 Tenth St',
            'estadoPedido' => 'Solicitado',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente11->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '753 Eleventh St',
            'estadoPedido' => 'En preparación',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente12->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '159 Twelfth St',
            'estadoPedido' => 'En entrega',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente13->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '246 Thirteenth St',
            'estadoPedido' => 'Solicitado',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente5->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '753 Fifth St',
            'estadoPedido' => 'En entrega',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente6->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '987 Sixth St',
            'estadoPedido' => 'En entrega',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente7->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '159 Seventh St',
            'estadoPedido' => 'Solicitado',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente8->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '246 Eighth St',
            'estadoPedido' => 'En preparación',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente9->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '951 Ninth St',
            'estadoPedido' => 'En entrega',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente10->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '753 Tenth St',
            'estadoPedido' => 'Solicitado',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente11->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '159 Eleventh St',
            'estadoPedido' => 'En preparación',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente12->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '246 Twelfth St',
            'estadoPedido' => 'En entrega',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente13->id,
            'Usuario' => $user2->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '951 Thirteenth St',
            'estadoPedido' => 'Solicitado',
        ]);
        
        Pedido::create([
            'idCliente' => $cliente14->id,
            'Usuario' => $user1->id,
            'fechaPedido' => now(),
            'direccionEnvio' => '753 Fourteenth St',
            'estadoPedido' => 'En preparación',
        ]);

        Pedido::create([
            'idCliente' => $cliente3->id,
            'Usuario' => $user2->id,
            'fechaPedido' => '2024-02-02 07:20:28',
            'direccionEnvio' => 'Cacueta',
            'estadoPedido' => 'solicitado',
        ]);

        Pedido::create([
            'idCliente' => $cliente3->id,
            'Usuario' => $user2->id,
            'fechaPedido' => '2024-02-02 07:20:28',
            'direccionEnvio' => 'Cacueta',
            'estadoPedido' => 'entregado',
        ]);

        Pedido::create([
            'idCliente' => $cliente3->id,
            'Usuario' => null,
            'fechaPedido' => '2024-02-01 07:20:28',
            'direccionEnvio' => 'Cacueta',
            'estadoPedido' => 'en entrega',
        ]);
        
    }
}
