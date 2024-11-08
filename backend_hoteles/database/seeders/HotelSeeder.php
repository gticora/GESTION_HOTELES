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
        Hotel::create([
            'nombre' => 'Hotel test',
            'ciudad' => 'Ibague',
            'numero_habitaciones' => 10,
            'direccion' => 'Calle Ficticia 123',
            'nit' => '151515',
        ]);
    }
}
