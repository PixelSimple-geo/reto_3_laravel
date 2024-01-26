<?php

namespace Database\Seeders;

use App\Models\FormatoProducto;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormatoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto1 = Producto::first();
        $producto2 = Producto::find(2);

        FormatoProducto::create([
            'idProducto' => $producto1->id,
            'formatoEnvase' => 'Botella',
            'unidades' => 6,
            'precioUnitario' => 15.99,
        ]);

        FormatoProducto::create([
            'idProducto' => $producto2->id,
            'formatoEnvase' => 'Paquete',
            'unidades' => 10,
            'precioUnitario' => 9.99,
        ]);

        for ($i = 3; $i <= 10; $i++) {
            FormatoProducto::create([
                'idProducto' => $producto1->id,
                'formatoEnvase' => 'Caja',
                'unidades' => 12,
                'precioUnitario' => 22.50,
            ]);
        }
    }
}
