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
            'correoCliente' => 'john.doe@gmail.com',
        ]);

        Cliente::create([
            'codigoCliente' => '87654321',
            'nombreCliente' => 'Jane',
            'apellidoCliente' => 'Doe',
            'correoCliente' => 'jane.doe@yahoo.com',
        ]);

        Cliente::create([
            'codigoCliente' => '98765432',
            'nombreCliente' => 'Oribe',
            'apellidoCliente' => 'Prime',
            'correoCliente' => 'oribe.prime@jefe.com',
        ]);

        Cliente::create([
            'codigoCliente' => '23456789',
            'nombreCliente' => 'Bob',
            'apellidoCliente' => 'Johnson',
            'correoCliente' => 'bob.johnson@gmail.com',
        ]);

        Cliente::create([
            'codigoCliente' => '34567890',
            'nombreCliente' => 'Emily',
            'apellidoCliente' => 'Williams',
            'correoCliente' => 'emily.williams@yahoo.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '45678901',
            'nombreCliente' => 'Michael',
            'apellidoCliente' => 'Brown',
            'correoCliente' => 'michael.brown@example.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '56789012',
            'nombreCliente' => 'Sophia',
            'apellidoCliente' => 'Taylor',
            'correoCliente' => 'sophia.taylor@example.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '67890123',
            'nombreCliente' => 'Yalero',
            'apellidoCliente' => 'Woof',
            'correoCliente' => 'yalero.woof@aulamonar.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '78901234',
            'nombreCliente' => 'Olivia',
            'apellidoCliente' => 'Thomas',
            'correoCliente' => 'olivia.thomas@yahoo.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '89012345',
            'nombreCliente' => 'James',
            'apellidoCliente' => 'Jackson',
            'correoCliente' => 'james.jackson@cricri.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '90123456',
            'nombreCliente' => 'Sophie',
            'apellidoCliente' => 'Harris',
            'correoCliente' => 'sophie.harris@example.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '01234567',
            'nombreCliente' => 'Ethan',
            'apellidoCliente' => 'White',
            'correoCliente' => 'ethan.white@patata.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '54321098',
            'nombreCliente' => 'Isabella',
            'apellidoCliente' => 'Martinez',
            'correoCliente' => 'isabella.martinez@gmail.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '65432109',
            'nombreCliente' => 'Alexander',
            'apellidoCliente' => 'Garcia',
            'correoCliente' => 'alexander.garcia@example.com',
        ]);
        
        Cliente::create([
            'codigoCliente' => '76543210',
            'nombreCliente' => 'Charlotte',
            'apellidoCliente' => 'Lopez',
            'correoCliente' => 'charlotte.lopez@yahoo.com',
        ]);
        
    }
}
