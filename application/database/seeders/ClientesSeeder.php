<?php

namespace Database\Seeders;

use App\Models\Cliente;
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

        Cliente::create([
            'codigoCliente' => '98765432',
            'nombreCliente' => 'Alice',
            'apellidoCliente' => 'Smith',
            'correoCliente' => 'alice.smith@example.com',
        ]);

        Cliente::create([
            'codigoCliente' => '23456789',
            'nombreCliente' => 'Bob',
            'apellidoCliente' => 'Johnson',
            'correoCliente' => 'bob.johnson@example.com',
        ]);

        Cliente::create([
            'codigoCliente' => '34567890',
            'nombreCliente' => 'Emily',
            'apellidoCliente' => 'Williams',
            'correoCliente' => 'emily.williams@example.com',
        ]);
    }
}
