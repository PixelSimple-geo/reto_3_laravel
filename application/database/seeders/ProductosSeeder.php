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
        $categoria3 = Categoria::find(3);
        $categoria4 = Categoria::find(4);
        $categoria5 = Categoria::find(5);
        $categoria6 = Categoria::find(6);

        Producto::create([
            'idCategoria' => $categoria4->id,
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
            'idCategoria' => $categoria3->id,
            'nombreProducto' => 'UltraKiller',
            'descripcionProducto' => 'Una Stout rica y cremosa, con sabores a café y chocolate oscuro, perfecta para disfrutar junto a la chimenea en las noches frías.',
            'fotoURL' => 'https://example.com/ultrakiller-stout.jpg',
        ]);

        Producto::create([
            'idCategoria' => $categoria1->id,
            'nombreProducto' => 'Golden Ale',
            'descripcionProducto' => 'Una cerveza dorada y refrescante, con un equilibrio perfecto entre maltas y lúpulos.',
            'fotoURL' => 'https://example.com/golden-ale.jpg',
        ]);
        
        Producto::create([
            'idCategoria' => $categoria3->id,
            'nombreProducto' => 'Amber Lager',
            'descripcionProducto' => 'Una cerveza de color ámbar con un sabor suave y tostado, ideal para maridar con comidas ligeras.',
            'fotoURL' => 'https://example.com/amber-lager.jpg',
        ]);
        
        Producto::create([
            'idCategoria' => $categoria4->id,
            'nombreProducto' => 'Double IPA',
            'descripcionProducto' => 'Una India Pale Ale con un doble golpe de lúpulo, perfecta para los amantes de los sabores intensos.',
            'fotoURL' => 'https://example.com/double-ipa.jpg',
        ]);
        
        Producto::create([
            'idCategoria' => $categoria5->id,
            'nombreProducto' => 'Wheat Ale',
            'descripcionProducto' => 'Una cerveza de trigo ligera y refrescante, con notas especiadas y un toque cítrico.',
            'fotoURL' => 'https://example.com/wheat-ale.jpg',
        ]);
        
        Producto::create([
            'idCategoria' => $categoria6->id,
            'nombreProducto' => 'Sparkling Water',
            'descripcionProducto' => 'Un agua mineral burbujeante y cristalina, perfecta para saciar la sed en cualquier momento del día.',
            'fotoURL' => 'https://example.com/sparkling-water.jpg',
        ]);
        
        Producto::create([
            'idCategoria' => $categoria1->id,
            'nombreProducto' => 'Blonde Ale',
            'descripcionProducto' => 'Una cerveza ale rubia con un cuerpo ligero y un sabor suave, perfecta para disfrutar en días soleados.',
            'fotoURL' => 'https://example.com/blonde-ale.jpg',
        ]);
        
        Producto::create([
            'idCategoria' => $categoria2->id,
            'nombreProducto' => 'Porter Oscuro',
            'descripcionProducto' => 'Una cerveza porter oscura y robusta, con sabores a café, chocolate y notas tostadas.',
            'fotoURL' => 'https://example.com/dark-porter.jpg',
        ]);        
    }
}
