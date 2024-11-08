<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las habitaciones, puedes agregar filtros si es necesario
        $habitaciones = Habitacion::all();
        return response()->json($habitaciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de la habitación
        $request->validate([
            'hotel_id' => 'required|exists:hoteles,id',
            'tipo_habitacion_id' => 'required|exists:tipos_habitaciones,id',
            'acomodacion_id' => 'required|exists:acomodaciones,id',
            'cantidad' => 'required|numeric',
        ]);

        try {
            // Crear la habitación
            $habitacion = Habitacion::create($request->all());
            // Si todo va bien, devolver la respuesta con los datos de la habitación creada
            return response()->json($habitacion, 201);
            
        } catch (\Exception $e) {
            // Capturar cualquier excepción que se haya lanzado desde el modelo
            // Devolver el error como respuesta en formato JSON
            return response()->json([
                'error' => $e->getMessage() // El mensaje de la excepción
            ], 400); // Ajustar el código de estado (400 en este caso) según el tipo de error
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Habitacion $habitacion)
    {
        return response()->json($habitacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habitacion $habitacion)
    {
        // Validar los datos de la habitación
        $request->validate([
            'hotel_id' => 'required|exists:hoteles,id',
            'tipo_habitacion_id' => 'required|exists:tipos_habitacion,id',
            'acomodacion_id' => 'required|exists:acomodaciones,id',
            'cantidad' => 'required|numeric',
        ]);

        
        try {
           // Actualizar los datos de la habitación
            $habitacion->update($request->all());
            return response()->json($habitacion,201);            
        } catch (\Exception $e) {
            // Capturar cualquier excepción que se haya lanzado desde el modelo
            // Devolver el error como respuesta en formato JSON
            return response()->json([
                'error' => $e->getMessage() // El mensaje de la excepción
            ], 400); // Ajustar el código de estado (400 en este caso) según el tipo de error
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitacion $habitacion)
    {
        $habitacion->delete();
        return response()->json(null, 204);
    }
}
