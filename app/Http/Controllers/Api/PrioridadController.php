<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Prioridades;
use Illuminate\Http\Response;

class PrioridadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prioridades = Prioridades::all();

        return response()->json($prioridades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $prioridad = Prioridades::create($request->all());

        return response()->json($prioridad, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prioridad = Prioridades::find($id);

        if (!$prioridad) {
            return response()->json(['message' => 'Prioridad no encontrada'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($prioridad);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $prioridad = Prioridades::find($id);

        if (!$prioridad) {
            return response()->json(['message' => 'Prioridad no encontrada'], Response::HTTP_NOT_FOUND);
        }

        $prioridad->update($request->all());

        return response()->json($prioridad, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prioridad = Prioridades::find($id);

        if (!$prioridad) {
            return response()->json(['message' => 'Prioridad no encontrada'], Response::HTTP_NOT_FOUND);
        }

        $prioridad->delete();

        return response()->json(['message' => 'Prioridad eliminada con éxito'], Response::HTTP_OK);
    }
}
