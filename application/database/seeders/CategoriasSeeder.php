<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombreCategoria' => 'Verduras',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Frutas',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Carne',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Lácteos',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Panadería',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Cerveza',
        ]);
    }
}
