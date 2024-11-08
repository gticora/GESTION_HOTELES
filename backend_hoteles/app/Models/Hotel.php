<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    
    protected $table = 'hoteles';

    protected $fillable = [
        'nombre',
        'ciudad',
        'numero_habitaciones',
        'direccion',
        'nit'
    ];

    // Relación de uno a muchos con Habitacion
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class);
    }
}
