<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "fecha_registro",
        "puntuacion"
    ];

    protected $appends = ["fecha_registro_t"];

    public function getFechaRegistroTAttribute()
    {
        return date("d/m/Y", strtotime($this->fecha_registro));
    }

    public function evaluacion_basicas()
    {
        return $this->hasMany(EvaluacionBasica::class, 'evaluacion_id');
    }

    public function evaluacion_carreras()
    {
        return $this->hasMany(EvaluacionCarrera::class, 'evaluacion_id');
    }

    public function evaluacion_postgrados()
    {
        return $this->hasMany(EvaluacionPostgrado::class, 'evaluacion_id');
    }
    public function evaluacion_cursos()
    {
        return $this->hasMany(EvaluacionCurso::class, 'evaluacion_id');
    }
    public function evaluacion_laborals()
    {
        return $this->hasMany(EvaluacionLaboral::class, 'evaluacion_id');
    }
    public function evaluacion_distincions()
    {
        return $this->hasMany(EvaluacionDistincion::class, 'evaluacion_id');
    }
}
