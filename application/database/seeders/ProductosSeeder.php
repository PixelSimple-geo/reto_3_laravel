<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
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
            'nombreProducto' => 'Killer Lager',
            'descripcionProducto' => 'Una cerveza Lager refrescante y fácil de beber, perfecta para cualquier ocasión.',
            'fotoURL' => 'https://example.com/killer-lager.jpg',
        ]);

        Producto::create([
            'idCategoria' => $categoria2->id,
            'nombreProducto' => 'MegaKiller',
            'descripcionProducto' => 'Una India Pale Ale intensamente lupulada y llena de sabor, con notas cítricas y afrutadas.',
            'fotoURL' => 'https://example.com/megakiller-ipa.jpg',
        ]);

        Producto::create([
            'idCategoria' => $categoria2->id,
            'nombreProducto' => 'Killer00',
            'descripcionProducto' => 'Una Pilsner clásica y equilibrada, con un ligero amargor y un final limpio y refrescante.',
            'fotoURL' => 'https://example.com/killer00-pilsner.jpg',
        ]);

        Producto::create([
            'idCategoria' => $categoria2->id,
            'nombreProducto' => 'UltraKiller',
            'descripcionProducto' => 'Una Stout rica y cremosa, con sabores a café y chocolate oscuro, perfecta para disfrutar junto a la chimenea en las noches frías.',
            'fotoURL' => 'https://example.com/ultrakiller-stout.jpg',
        ]);

    }
}
