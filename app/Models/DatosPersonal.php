<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosPersonal extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "tipo_ci",
        "nro_ci",
        "fecha_nacimiento",
        "lugar_nacimiento",
        "genero",
        "foto",
        "fono",
        "dir",
        "hoja_vida",
        "calificacion",
        "fecha_registro",
    ];

    protected $appends = ["fecha_registro_t", "url_foto", "url_hoja_vida"];

    public function getUrlFotoAttribute()
    {
        return asset('imgs/' . $this->foto);
    }
    public function getUrlHojaVidaAttribute()
    {
        return asset('files/' . $this->hoja_vida);
    }

    public function getFechaRegistroTAttribute()
    {
        return date("d/m/Y", strtotime($this->fecha_registro));
    }
}
