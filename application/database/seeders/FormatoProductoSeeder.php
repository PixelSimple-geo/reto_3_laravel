<?php

namespace Database\Seeders;

use App\Models\FormatoProducto;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class FormatoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto1 = Producto::where('nombreProducto', 'Killer Lager')->first();
        $producto2 = Producto::where('nombreProducto', 'MegaKiller')->first();
        $producto3 = Producto::where('nombreProducto', 'Killer00')->first();
        $producto4 = Producto::where('nombreProducto', 'UltraKiller')->first();

        FormatoProducto::create([
            'idProducto' => $producto1->id,
            'formatoEnvase' => '55cl',
            'unidades' => 6,
            'precioUnitario' => 15.99,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto2->id,
            'formatoEnvase' => '33cl',
            'unidades' => 10,
            'precioUnitario' => 9.99,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto3->id,
            'formatoEnvase' => '25cl',
            'unidades' => 12,
            'precioUnitario' => 22.50,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto4->id,
            'formatoEnvase' => 'Barril',
            'unidades' => 1,
            'precioUnitario' => 59.99,
        ]);

    }
}
