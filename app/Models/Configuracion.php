<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre_sistema",
        "alias",
        "logo",
    ];

    protected $appends = ["url_logo"];

    public function getUrlLogoAttribute()
    {
        return asset("imgs/" . $this->logo);
    }
}
