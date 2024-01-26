<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Clientes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'codigoCliente' => 'C001',
            'nombreCliente' => 'John',
            'apellidoCliente' => 'Doe',
            'correoCliente' => 'john.doe@example.com',
        ]);

        Cliente::create([
            'codigoCliente' => 'C002',
            'nombreCliente' => 'Jane',
            'apellidoCliente' => 'Doe',
            'correoCliente' => 'jane.doe@example.com',
        ]);
    }
}
