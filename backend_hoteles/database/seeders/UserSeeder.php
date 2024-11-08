<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear un usuario con datos de ejemplo
        $user = User::create([
            'name' => 'Gerente Hotelero',
            'email' => 'gerente@hotel.com',
            'password' => Hash::make('password123'),  // Asegúrate de usar Hash::make() para la contraseña
        ]);

        // Crear un token de acceso para el usuario (Sanctum)
        $user->createToken('Token de Acceso')->plainTextToken;
    }
}
