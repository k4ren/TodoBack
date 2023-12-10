<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Obtener ids de prioridades
         $altaId = DB::table('prioridades')->where('nombre', 'Alta')->value('id');
         $mediaId = DB::table('prioridades')->where('nombre', 'Media')->value('id');
 
         // Insertar tareas de ejemplo TodoApp
         DB::table('tareas')->insert([
             ['titulo' => 'Terminar proyecto', 'descripcion' => 'Implementar funcionalidad principal', 'estado' => false, 'prioridad_id' => $altaId],
             ['titulo' => 'Revisar documentos', 'descripcion' => 'Preparar para la reunión', 'estado' => true, 'prioridad_id' => $mediaId],
             ['titulo' => 'Hacer tarea 1', 'descripcion' => 'Terminar la sección de React', 'estado' => false, 'prioridad_id' => $altaId],
         ]);
    }
}
