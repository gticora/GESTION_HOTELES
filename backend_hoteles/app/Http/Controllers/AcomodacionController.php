<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acomodacion;
use App\Models\TipoHabitacion;

class AcomodacionController extends Controller
{
    public function index()
    {
        return Acomodacion::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:acomodaciones',
        ]);
        
        try {
            // Crear acomodacion
            $acomodacion = Acomodacion::create($request->all());
            return response()->json($acomodacion, 201);
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
     * @param  \App\Models\Acomodacion  $acomodacion
     * @return \Illuminate\Http\Response
     */

    public function show(Acomodacion $acomodacion)
    {
        return response()->json($acomodacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acomodacion  $acomodacion
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Acomodacion $acomodacion)
    {
        $request->validate([
            'nombre' => 'string|max:255|unique:acomodaciones,nombre,' . $acomodacion->id,
        ]);
        try {
            // Crear acomodacion
            $acomodacion->update($request->all());
            return response()->json($acomodacion);
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
     * @param  \App\Models\Acomodacion  $acomodacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acomodacion $acomodacion)
    {
        $acomodacion->delete();
        return response()->json(null, 204);
    }
}
