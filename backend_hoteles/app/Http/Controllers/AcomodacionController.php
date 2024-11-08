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
            'tipo_habitacion_id' => 'required|exists:tipo_habitaciones,id',
            'descripcion' => 'nullable|string',
        ]);

        // Validar que el tipo de habitación y acomodación sean correctos
        $tipoHabitacion = TipoHabitacion::find($request->tipo_habitacion_id);
        if ($tipoHabitacion->nombre == 'Estándar' && !in_array($request->nombre, ['Sencilla', 'Doble'])) {
            return response()->json(['error' => 'La acomodación para tipo Estándar solo puede ser Sencilla o Doble.'], 400);
        }
        if ($tipoHabitacion->nombre == 'Junior' && !in_array($request->nombre, ['Triple', 'Cuádruple'])) {
            return response()->json(['error' => 'La acomodación para tipo Junior solo puede ser Triple o Cuádruple.'], 400);
        }
        if ($tipoHabitacion->nombre == 'Suite' && !in_array($request->nombre, ['Sencilla', 'Doble', 'Triple'])) {
            return response()->json(['error' => 'La acomodación para tipo Suite solo puede ser Sencilla, Doble o Triple.'], 400);
        }

        $acomodacion = Acomodacion::create($request->all());

        return response()->json($acomodacion, 201);
    }

    public function show(Acomodacion $acomodacion)
    {
        return response()->json($acomodacion);
    }

    public function update(Request $request, Acomodacion $acomodacion)
    {
        $request->validate([
            'nombre' => 'string|max:255|unique:acomodaciones,nombre,' . $acomodacion->id,
            'tipo_habitacion_id' => 'exists:tipo_habitaciones,id',
            'descripcion' => 'nullable|string',
        ]);

        // Validar que el tipo de habitación y acomodación sean correctos
        $tipoHabitacion = TipoHabitacion::find($request->tipo_habitacion_id);
        if ($tipoHabitacion->nombre == 'Estándar' && !in_array($request->nombre, ['Sencilla', 'Doble'])) {
            return response()->json(['error' => 'La acomodación para tipo Estándar solo puede ser Sencilla o Doble.'], 400);
        }
        if ($tipoHabitacion->nombre == 'Junior' && !in_array($request->nombre, ['Triple', 'Cuádruple'])) {
            return response()->json(['error' => 'La acomodación para tipo Junior solo puede ser Triple o Cuádruple.'], 400);
        }
        if ($tipoHabitacion->nombre == 'Suite' && !in_array($request->nombre, ['Sencilla', 'Doble', 'Triple'])) {
            return response()->json(['error' => 'La acomodación para tipo Suite solo puede ser Sencilla, Doble o Triple.'], 400);
        }

        $acomodacion->update($request->all());

        return response()->json($acomodacion);
    }

    public function destroy(Acomodacion $acomodacion)
    {
        $acomodacion->delete();

        return response()->json(null, 204);
    }
}
