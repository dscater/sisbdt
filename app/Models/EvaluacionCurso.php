<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionCurso extends Model
{
    use HasFactory;

    protected $fillable = [
        "evaluacion_id",
        "nombre",
        "institucion",
        "fecha",
        "carga_horaria",
    ];

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }
}
