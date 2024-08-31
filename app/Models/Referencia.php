<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;

    protected $fillable = [
        "datos_otros_id",
        "nombre_ref",
        "cel_ref",
        "correo_ref",
        "cargo_ref",
        "relacion_ref",
        "descripcion",
    ];
}
