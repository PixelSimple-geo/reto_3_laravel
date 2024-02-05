<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombreCategoria' => 'Cerveza Rubia',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Cerveza Negra',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Cerveza Tostada',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Cerveza IPA',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Cerveza de Trigo',
        ]);

        Categoria::create([
            'nombreCategoria' => 'Agua',
        ]);
    }
}
