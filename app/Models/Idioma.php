<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = [
        "datos_otros_id",
        "idioma",
        "nivel",
        "certificado",
    ];

    public function l_idioma()
    {
        return $this->belongsTo(ListaIdioma::class, 'idioma');
    }
}
