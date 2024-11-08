<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Habitacion extends Model
{
    use HasFactory;
    protected $table = 'habitaciones';
    protected $fillable = [
        'hotel_id',
        'tipo_habitacion_id',
        'acomodacion_id',
        'cantidad'
    ];

    protected static function booted()
    {
        static::creating(function ($habitacion) {

            // Verificar que no exista otra habitación con el mismo tipo y acomodación para el mismo hotel
            $existingHabitacion = Habitacion::where('hotel_id', $habitacion->hotel_id)
            ->where('tipo_habitacion_id', $habitacion->tipo_habitacion_id)
            ->where('acomodacion_id', $habitacion->acomodacion_id)
            ->exists();

            if ($existingHabitacion) {
                throw new \Exception("Ya existe una habitación con este tipo y acomodación para este hotel.");
            }
            // Validar que el total de habitaciones no supere el máximo
            $hotel = $habitacion->hotel;
            $totalHabitaciones = $hotel->habitaciones()->sum('cantidad') + $habitacion->cantidad;

            if ($totalHabitaciones > $hotel->numero_habitaciones) {
                throw new Exception("La cantidad total de habitaciones configuradas supera el máximo permitido para este hotel.");
            }

            // Validar acomodaciones según el tipo de habitación
            $validAcomodaciones = self::getValidAcomodaciones($habitacion->tipo_habitacion_id);

            if (!in_array($habitacion->acomodacion_id, $validAcomodaciones)) {
                throw new Exception("La acomodación seleccionada no es válida para el tipo de habitación.");
            }
        });
    }

    public static function getValidAcomodaciones($tipoHabitacionId)
    {
        // Definir las acomodaciones válidas por tipo de habitación
        switch ($tipoHabitacionId) {
            case 1: // Estándar
                return [1, 2]; // Sencilla, Doble
            case 2: // Junior
                return [3, 4]; // Triple, Cuádruple
            case 3: // Suite
                return [1, 2, 3]; // Sencilla, Doble, Triple
            default:
                return [];
        }
    }

    // Relación con Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // Relación con TipoHabitacion
    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class);
    }

    // Relación con Acomodacion
    public function acomodacion()
    {
        return $this->belongsTo(Acomodacion::class);
    }
}
