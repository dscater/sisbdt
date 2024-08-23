<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametrizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        "primaria",
        "secundaria",
        "bachiller",
        "titulado",
        "egresado",
        "en_curso",
        "tecnico_superior",
        "tecnico_medio",
        "disciplina_ingenieria",
        "doctorado",
        "maestria",
        "especialidad",
        "diplomado",
        "c_carga_horaria",
        "p_cada_mes",
        "p_cada_reconocimiento",
    ];
}
