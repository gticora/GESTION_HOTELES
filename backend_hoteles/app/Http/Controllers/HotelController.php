<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        return Hotel::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:hotels',
            'ciudad' => 'required|string',
            'numero_habitaciones' => 'required|integer',
            'direccion' => 'required|string',
            'nit' => 'required|string|unique:hotels',
        ]);

        $hotel = Hotel::create($request->all());

        return response()->json($hotel, 201);
    }

    public function show(Hotel $hotel)
    {
        return response()->json($hotel);
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'nombre' => 'string|max:255|unique:hotels,nombre,' . $hotel->id,
            'ciudad' => 'string',
            'numero_habitaciones' => 'integer',
            'direccion' => 'string',
            'nit' => 'string|unique:hotels,nit,' . $hotel->id,
        ]);

        $hotel->update($request->all());

        return response()->json($hotel);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return response()->json(null, 204);
    }
}
