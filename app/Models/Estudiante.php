<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'clase_id'];

    // Relación: Un estudiante pertenece a una clase
    public function clase()
    {
        return $this->belongsTo(Clase::class); //
    }
}