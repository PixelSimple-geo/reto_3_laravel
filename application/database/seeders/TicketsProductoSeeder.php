<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ticket_producto')->insert([
            'idPedido' => 1,
            'idFormatoProducto' => 1,
            'unidades' => 6,
            'created_at' => '2024-01-05 08:00:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 2,
            'idFormatoProducto' => 2,
            'unidades' => 3,
            'created_at' => '2024-01-10 10:00:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 3,
            'idFormatoProducto' => 3,
            'unidades' => 7,
            'created_at' => '2024-01-15 14:00:00',
            'updated_at' => now(),
        ]);
        
        DB::table('ticket_producto')->insert([
            'idPedido' => 4,
            'idFormatoProducto' => 4,
            'unidades' => 6,
            'created_at' => '2024-02-02 09:00:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 5,
            'idFormatoProducto' => 5,
            'unidades' => 7,
            'created_at' => '2024-02-08 11:00:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 6,
            'idFormatoProducto' => 6,
            'unidades' => 10,
            'created_at' => '2024-02-12 16:00:00',
            'updated_at' => now(),
        ]);
        
        DB::table('ticket_producto')->insert([
            'idPedido' => 7,
            'idFormatoProducto' => 7,
            'unidades' => 15,
            'created_at' => '2024-03-03 08:30:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 8,
            'idFormatoProducto' => 8,
            'unidades' => 12,
            'created_at' => '2024-03-09 12:00:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 9,
            'idFormatoProducto' => 9,
            'unidades' => 9,
            'created_at' => '2024-03-15 15:45:00',
            'updated_at' => now(),
        ]);
        
        DB::table('ticket_producto')->insert([
            'idPedido' => 10,
            'idFormatoProducto' => 10,
            'unidades' => 6,
            'created_at' => '2024-04-01 10:30:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 11,
            'idFormatoProducto' => 11,
            'unidades' => 8,
            'created_at' => '2024-04-05 14:20:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 12,
            'idFormatoProducto' => 12,
            'unidades' => 1,
            'created_at' => '2024-04-10 17:00:00',
            'updated_at' => now(),
        ]);
        
        DB::table('ticket_producto')->insert([
            'idPedido' => 13,
            'idFormatoProducto' => 14,
            'unidades' => 7,
            'created_at' => '2024-02-18 09:30:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 14,
            'idFormatoProducto' => 5,
            'unidades' => 6,
            'created_at' => '2024-03-05 11:45:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 15,
            'idFormatoProducto' => 6,
            'unidades' => 8,
            'created_at' => '2024-03-12 14:20:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 16,
            'idFormatoProducto' => 7,
            'unidades' => 1,
            'created_at' => '2024-03-19 16:55:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 17,
            'idFormatoProducto' => 8,
            'unidades' => 12,
            'created_at' => '2024-04-03 08:10:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 18,
            'idFormatoProducto' => 9,
            'unidades' => 15,
            'created_at' => '2024-04-10 10:25:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 19,
            'idFormatoProducto' => 10,
            'unidades' => 3,
            'created_at' => '2024-04-15 12:40:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 20,
            'idFormatoProducto' => 11,
            'unidades' => 9,
            'created_at' => '2024-04-20 14:55:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 21,
            'idFormatoProducto' => 12,
            'unidades' => 11,
            'created_at' => '2024-04-25 17:10:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 22,
            'idFormatoProducto' => 13,
            'unidades' => 14,
            'created_at' => '2024-04-30 18:25:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 23,
            'idFormatoProducto' => 14,
            'unidades' => 4,
            'created_at' => '2024-04-05 20:40:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 5,
            'idFormatoProducto' => 16,
            'unidades' => 11,
            'created_at' => '2024-04-10 22:55:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 7,
            'idFormatoProducto' => 15,
            'unidades' => 21,
            'created_at' => '2024-04-15 01:10:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 9,
            'idFormatoProducto' => 17,
            'unidades' => 13,
            'created_at' => '2024-04-20 03:25:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 9,
            'idFormatoProducto' => 18,
            'unidades' => 10,
            'created_at' => '2024-03-25 05:40:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 3,
            'idFormatoProducto' => 18,
            'unidades' => 12,
            'created_at' => '2024-03-30 07:55:00',
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 6,
            'idFormatoProducto' => 19,
            'unidades' => 1,
            'created_at' => '2024-04-05 09:10:00',
            'updated_at' => now(),
        ]);
    }
}
