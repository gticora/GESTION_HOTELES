<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Hotel::all();
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
            'nombre' => 'required|string|max:255|unique:hoteles',
            'ciudad' => 'required|string',
            'numero_habitaciones' => 'required|integer',
            'direccion' => 'required|string',
            'nit' => 'required|string|unique:hoteles',
        ]);        

        try {
            // Crear el hotel
            $hotel = Hotel::create($request->all());
            // Si todo va bien, devolver la respuesta con los datos del hotel creado
            return response()->json($hotel, 201);
            
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
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */

    public function show(Hotel $hotel)
    {
        return response()->json($hotel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'nombre' => 'string|max:255|unique:hoteles,nombre,' . $hotel->id,
            'ciudad' => 'string',
            'numero_habitaciones' => 'integer',
            'direccion' => 'string',
            'nit' => 'string|unique:hoteles,nit,' . $hotel->id,
        ]);

        try {
            // Actualizar el hotel
            $hotel->update($request->all());
            return response()->json($hotel,201);
            
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
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return response()->json(null, 204);
    }
}
