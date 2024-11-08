<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoHabitacion;

class TipoHabitacionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoHabitacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:tipo_habitaciones',
            'descripcion' => 'nullable|string',
        ]);

        try {
            // Crear el tipo habitacion
            $tipoHabitacion = TipoHabitacion::create($request->all());
            return response()->json($tipoHabitacion, 201);
            
        } catch (\Exception $e) {
            // Capturar cualquier excepción que se haya lanzado desde el modelo
            // Devolver el error como respuesta en formato JSON
            return response()->json([
                'error' => $e->getMessage() // El mensaje de la excepción
            ], 400); // ajustar el código de estado (400 en este caso) según el tipo de error
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoHabitacion  $tipoHabitacion
     * @return \Illuminate\Http\Response
     */
    public function show(TipoHabitacion $tipoHabitacion)
    {
        return response()->json($tipoHabitacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoHabitacion  $tipoHabitacion
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, TipoHabitacion $tipoHabitacion)
    {
        $request->validate([
            'nombre' => 'string|max:255|unique:tipo_habitaciones,nombre,' . $tipoHabitacion->id,
            'descripcion' => 'nullable|string',
        ]);


        try {
            // Actualizar el tipo habitacion
            $tipoHabitacion->update($request->all());
            return response()->json($tipoHabitacion,201);
            
        } catch (\Exception $e) {
            // Capturar cualquier excepción que se haya lanzado desde el modelo
            // Devolver el error como respuesta en formato JSON
            return response()->json([
                'error' => $e->getMessage() // El mensaje de la excepción
            ], 400); // ajustar el código de estado (400 en este caso) según el tipo de error
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoHabitacion  $tipoHabitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoHabitacion $tipoHabitacion)
    {
        $tipoHabitacion->delete();
        return response()->json(null, 204);
    }
}
