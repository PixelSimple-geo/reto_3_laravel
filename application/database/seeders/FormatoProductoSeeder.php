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
        $producto5 = Producto::where('nombreProducto', 'Golden Ale')->first();
        $producto6 = Producto::where('nombreProducto', 'Amber Lager')->first();
        $producto7 = Producto::where('nombreProducto', 'Double IPA')->first();
        $producto8 = Producto::where('nombreProducto', 'Wheat Ale')->first();
        $producto9 = Producto::where('nombreProducto', 'Sparkling Water')->first();
        $producto10 = Producto::where('nombreProducto', 'Blonde Ale')->first();
        $producto11 = Producto::where('nombreProducto', 'Porter Oscuro')->first();

        FormatoProducto::create([
            'idProducto' => $producto1->id,
            'formatoEnvase' => '55cl',
            'unidades' => 36,
            'precioUnitario' => 15.99,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto1->id,
            'formatoEnvase' => '20cl',
            'unidades' => 20,
            'precioUnitario' => 30,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto2->id,
            'formatoEnvase' => '33cl',
            'unidades' => 41,
            'precioUnitario' => 9.99,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto3->id,
            'formatoEnvase' => 'barril',
            'unidades' => 29,
            'precioUnitario' => 22.50,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto4->id,
            'formatoEnvase' => 'Barril',
            'unidades' => 33,
            'precioUnitario' => 59.99,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto5->id,
            'formatoEnvase' => '33cl',
            'unidades' => 35,
            'precioUnitario' => 12.99,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto6->id,
            'formatoEnvase' => '55cl',
            'unidades' => 24,
            'precioUnitario' => 29.99,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto7->id,
            'formatoEnvase' => '55cl',
            'unidades' => 15,
            'precioUnitario' => 17.50,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto8->id,
            'formatoEnvase' => '55cl',
            'unidades' => 19,
            'precioUnitario' => 45.00,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto9->id,
            'formatoEnvase' => 'Barril',
            'unidades' => 40,
            'precioUnitario' => 21.99,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto10->id,
            'formatoEnvase' => '33cl',
            'unidades' => 22,
            'precioUnitario' => 14.75,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto11->id,
            'formatoEnvase' => '25cl',
            'unidades' => 12,
            'precioUnitario' => 8.50,
        ]);

        FormatoProducto::create([
            'idProducto' => 5,
            'formatoEnvase' => 'Barril',
            'unidades' => 28,
            'precioUnitario' => 12.99,
        ]);

        FormatoProducto::create([
            'idProducto' => 6,
            'formatoEnvase' => '33cl',
            'unidades' => 34,
            'precioUnitario' => 29.99,
        ]);

        FormatoProducto::create([
            'idProducto' => 7,
            'formatoEnvase' => 'Barril',
            'unidades' => 61,
            'precioUnitario' => 17.50,
        ]);

        FormatoProducto::create([
            'idProducto' => 8,
            'formatoEnvase' => '33cl',
            'unidades' => 21,
            'precioUnitario' => 45.00,
        ]);

        FormatoProducto::create([
            'idProducto' => 9,
            'formatoEnvase' => '55cl',
            'unidades' => 19,
            'precioUnitario' => 21.99,
        ]);

        FormatoProducto::create([
            'idProducto' => 10,
            'formatoEnvase' => '25cl',
            'unidades' => 38,
            'precioUnitario' => 14.75,
        ]);

        FormatoProducto::create([
            'idProducto' => 11,
            'formatoEnvase' => 'Botella',
            'unidades' => 41,
            'precioUnitario' => 8.50,
        ]);

        FormatoProducto::create([
            'idProducto' => 3,
            'formatoEnvase' => '25cl',
            'unidades' => 10,
            'precioUnitario' => 19.99,
        ]);
    }
}
