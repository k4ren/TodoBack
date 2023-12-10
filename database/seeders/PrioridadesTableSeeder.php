<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioridadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Insertar las prioridades
         DB::table('prioridades')->insert([
            ['nombre' => 'Alta'],
            ['nombre' => 'Media'],
            ['nombre' => 'Baja'],
        ]);
    }
}
