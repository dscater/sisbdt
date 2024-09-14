<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionLaboral extends Model
{
    use HasFactory;

    protected $fillable = [
        "evaluacion_id",
        "cargo",
        "institucion",
        "fecha_ini",
        "fecha_fin",
        "descripcion",
    ];

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }
}
