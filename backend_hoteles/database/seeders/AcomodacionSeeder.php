<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Acomodacion;

class AcomodacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        // Crear los tipos de habitación
        Acomodacion::create([
            'nombre' => 'Sencilla',
        ]);

        Acomodacion::create([
            'nombre' => 'Doble',
        ]);

        Acomodacion::create([
            'nombre' => 'Triple',
        ]);

        Acomodacion::create([
            'nombre' => 'Cuadruple',
        ]);
    }
}
