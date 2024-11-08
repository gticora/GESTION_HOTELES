<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('hoteles')->onDelete('cascade');
            $table->foreignId('tipo_habitacion_id')->constrained('tipos_habitaciones');
            $table->foreignId('acomodacion_id')->constrained('acomodaciones');
            $table->integer('cantidad');
            $table->timestamps();
    
            // Clave única para evitar duplicados en tipo de habitación y acomodación por hotel
            $table->unique(['hotel_id', 'tipo_habitacion_id', 'acomodacion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
