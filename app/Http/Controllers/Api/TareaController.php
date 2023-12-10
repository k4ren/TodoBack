<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tareas::with('prioridad')->get();

        $tareas_estados = $tareas->map(function ($todo) {
            return [
                'id' => $todo->id,
                'titulo' => $todo->titulo,
                'descripcion' => $todo->descripcion,
                'fecha' => $todo->created_at,
                'estado' => ($todo->estado === 0) ? false : true,
                'prioridad' => [
                    'id' => $todo->prioridad->id,
                    'nombre' => $todo->prioridad->nombre,
                  ],
            ];
        });

        return response()->json($tareas_estados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'estado' => 'required',
            'prioridad' => 'required|exists:prioridades,id',
        ]);

        $tarea = Tareas::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'prioridad_id' => $request->prioridad
        ]);

        return response()->json($tarea, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tarea = Tareas::with('prioridad')->find($id);

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], Response::HTTP_NOT_FOUND);
        }

        $tarea_prioridad = [
            'id' => $tarea->id,
            'descripcion' => $tarea->descripcion,
            'estado' => $tarea->estado,
            'prioridad' => [
                'id' => $tarea->prioridad->id,
                'nombre' => $tarea->prioridad->nombre
            ],
        ];

        return response()->json($tarea_prioridad);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'prioridad_id' => 'required|exists:prioridades,id',
        ]);

        $tarea = Tareas::find($id);

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], Response::HTTP_NOT_FOUND);
        }

        $tarea->update($request->all());

        return response()->json($tarea, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarea = Tareas::find($id);

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], Response::HTTP_NOT_FOUND);
        }

        $tarea->delete();

        return response()->json(['message' => 'Tarea eliminada con éxito'], Response::HTTP_OK);
    }
}
