<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Hotel::create([
            'nombre' => 'Hotel de Prueba',
            'ciudad' => 'Ciudad X',
            'numero_habitaciones' => 100,
            'direccion' => 'Calle Ficticia 123',
            'nit' => '123456789',
        ]);
    }
}
