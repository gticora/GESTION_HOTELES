<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoHabitacion;

class TipoHabitacionController extends Controller
{
    public function index()
    {
        return TipoHabitacion::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:tipo_habitaciones',
            'descripcion' => 'nullable|string',
        ]);

        $tipoHabitacion = TipoHabitacion::create($request->all());

        return response()->json($tipoHabitacion, 201);
    }

    public function show(TipoHabitacion $tipoHabitacion)
    {
        return response()->json($tipoHabitacion);
    }

    public function update(Request $request, TipoHabitacion $tipoHabitacion)
    {
        $request->validate([
            'nombre' => 'string|max:255|unique:tipo_habitaciones,nombre,' . $tipoHabitacion->id,
            'descripcion' => 'nullable|string',
        ]);

        $tipoHabitacion->update($request->all());

        return response()->json($tipoHabitacion);
    }

    public function destroy(TipoHabitacion $tipoHabitacion)
    {
        $tipoHabitacion->delete();

        return response()->json(null, 204);
    }
}
