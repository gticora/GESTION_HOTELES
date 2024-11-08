<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoHabitacion;

class TipoHabitacionSeeder extends Seeder
{
    public function run()
    {
        // Crear los tipos de habitación
        TipoHabitacion::create([
            'nombre' => 'Estándar',
        ]);

        TipoHabitacion::create([
            'nombre' => 'Junior',
        ]);

        TipoHabitacion::create([
            'nombre' => 'Suite',
        ]);
    }
}
