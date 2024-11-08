<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\AcomodacionController;
use App\Http\Controllers\HabitacionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Rutas protegidas para los modelos
    Route::apiResource('hoteles', HotelController::class);
    Route::apiResource('tipos-habitacion', TipoHabitacionController::class);
    Route::apiResource('acomodaciones', AcomodacionController::class);
    Route::apiResource('habitaciones', HabitacionController::class);
    // Ruta personalizada para obtener habitaciones por hotel_id
    Route::get('/habitaciones/hotel/{hotelId}', [HabitacionController::class, 'getHabitacionesPorHotel']);
});
