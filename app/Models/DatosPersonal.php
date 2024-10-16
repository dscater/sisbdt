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

    protected $appends = ["fecha_registro_t", "url_foto", "url_hoja_vida", "foto_b64"];

    public function getUrlFotoAttribute()
    {
        return asset('imgs/' . $this->foto);
    }
    public function getFotoB64Attribute()
    {
        $path = public_path("imgs/" . $this->foto);
        if (!$this->foto || !file_exists($path)) {
            $path = public_path("imgs/users/default.png");
        }
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
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
