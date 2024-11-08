<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Habitacion;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Habitacion::create([
            'hotel_id' => 1, // ID del hotel 
            'tipo_habitacion_id' => 1,
            'cantidad' => 25,
            'acomodacion_id' => 1,
        ]);

        Habitacion::create([
            'hotel_id' => 1, // ID del hotel 
            'tipo_habitacion_id' => 2,
            'cantidad' => 12,
            'acomodacion_id' => 3,
        ]);

        Habitacion::create([
            'hotel_id' => 1, // ID del hotel 
            'tipo_habitacion_id' => 1,
            'cantidad' => 5,
            'acomodacion_id' => 2,
        ]);
    }
}
