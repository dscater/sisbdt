<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionDistincion extends Model
{
    use HasFactory;

    protected $fillable = [
        "evaluacion_id",
        "merito",
        "institucion",
        "fecha",
    ];

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'evaluacion_id');
    }
}
