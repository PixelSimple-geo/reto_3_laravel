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
            'unidades' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 2,
            'idFormatoProducto' => 2,
            'unidades' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 3,
            'idFormatoProducto' => 3,
            'unidades' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 2,
            'idFormatoProducto' => 4,
            'unidades' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ticket_producto')->insert([
            'idPedido' => 1,
            'idFormatoProducto' => 4,
            'unidades' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
