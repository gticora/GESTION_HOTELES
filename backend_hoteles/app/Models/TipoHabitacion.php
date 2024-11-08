<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    use HasFactory;
    
    protected $table = 'tipos_habitaciones';

    protected $fillable = ['nombre'];

    // Relación de uno a muchos con Habitacion
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class);
    }
    
}
