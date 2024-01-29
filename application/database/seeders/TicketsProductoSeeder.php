<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfRecords = 3;

        for ($i = 1; $i <= $numberOfRecords; $i++) {
            DB::table('ticket_producto')->insert([
                'idPedido' => $i,
                'idFormatoProducto' => $i,
                'unidades' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
