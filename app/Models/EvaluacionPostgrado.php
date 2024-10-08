<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionPostgrado extends Model
{
    use HasFactory;
    protected $fillable = [
        "evaluacion_id",
        "institucion",
        "fecha_postgrado",
        "titulo",
        "nivel",
        "postgrado",
    ];
}
