<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria1 = Categoria::first();
        $categoria2 = Categoria::find(2);

        Producto::create([
            'idCategoria' => $categoria2->id,
            'nombreProducto' => 'Producto 1',
            'descripcionProducto' => 'Descripción del producto 1',
            'fotoURL' => 'https://example.com/producto1.jpg',
        ]);

        Producto::create([
            'idCategoria' => $categoria2->id,
            'nombreProducto' => 'Producto 2',
            'descripcionProducto' => 'Descripción del producto 2',
            'fotoURL' => 'https://example.com/producto2.jpg',
        ]);

        for ($i = 3; $i <= 10; $i++) {
            Producto::create([
                'idCategoria' => $categoria1->id,
                'nombreProducto' => "Producto $i",
                'descripcionProducto' => "Descripción del producto $i",
                'fotoURL' => "https://example.com/producto$i.jpg",
            ]);
        }
    }
}
