<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acomodacion extends Model
{
    use HasFactory;
    protected $table = 'acomodaciones';
    
    protected $fillable = ['nombre'];

    // Relación de uno a muchos con Habitacion
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class);
    }
}
