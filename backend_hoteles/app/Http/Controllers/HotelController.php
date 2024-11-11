<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Validation\ValidationException;

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
        try {
            $request->validate([
                'nombre' => 'required|string|max:255|unique:hoteles',
                'ciudad' => 'required|string',
                'numero_habitaciones' => 'required|integer',
                'direccion' => 'required|string',
                'nit' => 'required|string|unique:hoteles',
            ]);
    
            // Si las validaciones pasan
            $hotel = Hotel::create($request->all());
            return response()->json($hotel, 201);
            
        } catch (ValidationException $e) {
            // Si la validación falla, devolver los errores de validación
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Capturar otras excepciones
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
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
        try {
            $request->validate([
                'nombre' => 'string|max:255|unique:hoteles,nombre,' . $hotel->id,
                'ciudad' => 'string',
                'numero_habitaciones' => 'integer',
                'direccion' => 'string',
                'nit' => 'string|unique:hoteles,nit,' . $hotel->id,
            ]);
            // Actualizar el hotel
            $hotel->update($request->all());
            return response()->json($hotel,201);
            
        } catch (ValidationException $e) {
            // Si la validación falla, devolver los errores de validación
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Capturar otras excepciones
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->getMessage()
            ], 400);
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
