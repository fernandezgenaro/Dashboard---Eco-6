<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación: Una clase tiene muchos estudiantes
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class); //
    }
}