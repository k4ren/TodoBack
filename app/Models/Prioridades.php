<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridades extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
