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
            'fotoURL' => 'https://images.unsplash.com/photo-1600788886242-5c96aabe3757?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        Producto::create([
            'idCategoria' => $categoria2->id,
            'nombreProducto' => 'Producto 2',
            'descripcionProducto' => 'Descripción del producto 2',
            'fotoURL' => 'https://images.unsplash.com/photo-1618183479302-1e0aa382c36b?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        ]);

        for ($i = 3; $i <= 10; $i++) {
            Producto::create([
                'idCategoria' => $categoria1->id,
                'nombreProducto' => "Producto $i",
                'descripcionProducto' => "Descripción del producto $i",
                'fotoURL' => "https://images.unsplash.com/photo-1612528443702-f6741f70a049?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            ]);
        }
    }
}
