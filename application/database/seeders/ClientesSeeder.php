<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'codigoCliente' => '12345678',
            'nombreCliente' => 'John',
            'apellidoCliente' => 'Doe',
            'correoCliente' => 'john.doe@example.com',
        ]);

        Cliente::create([
            'codigoCliente' => '87654321',
            'nombreCliente' => 'Jane',
            'apellidoCliente' => 'Doe',
            'correoCliente' => 'jane.doe@example.com',
        ]);
    }
}
