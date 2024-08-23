<?php

namespace App\Http\Controllers;

use App\Models\Parametrizacion;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ParametrizacionController extends Controller
{
    public function index()
    {
        $parametrizacion = Parametrizacion::first();
        return Inertia::render("Parametrizacion/Index", compact("parametrizacion"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "primaria" => "required",
            "secundaria" => "required",
            "bachiller" => "required",
            "titulado" => "required",
            "egresado" => "required",
            "en_curso" => "required",
            "tecnico_superior" => "required",
            "tecnico_medio" => "required",
            "disciplina_ingenieria" => "required",
            "doctorado" => "required",
            "maestria" => "required",
            "especialidad" => "required",
            "diplomado" => "required",
            "c_carga_horaria" => "required",
            "p_cada_mes" => "required",
            "p_cada_reconocimiento" => "required",
        ], [
            "primaria.required" => "Este campo es obligatorio",
            "secundaria.required" => "Este campo es obligatorio",
            "bachiller.required" => "Este campo es obligatorio",
            "titulado.required" => "Este campo es obligatorio",
            "egresado.required" => "Este campo es obligatorio",
            "en_curso.required" => "Este campo es obligatorio",
            "tecnico_superior.required" => "Este campo es obligatorio",
            "tecnico_medio.required" => "Este campo es obligatorio",
            "disciplina_ingenieria.required" => "Este campo es obligatorio",
            "doctorado.required" => "Este campo es obligatorio",
            "maestria.required" => "Este campo es obligatorio",
            "especialidad.required" => "Este campo es obligatorio",
            "diplomado.required" => "Este campo es obligatorio",
            "c_carga_horaria.required" => "Este campo es obligatorio",
            "p_cada_mes.required" => "Este campo es obligatorio",
            "p_cada_reconocimiento.required" => "Este campo es obligatorio",
        ]);

        $parametrizacion = Parametrizacion::first();

        $datos = [
            "primaria" => $request->primaria,
            "secundaria" => $request->secundaria,
            "bachiller" => $request->bachiller,
            "titulado" => $request->titulado,
            "egresado" => $request->egresado,
            "en_curso" => $request->en_curso,
            "tecnico_superior" => $request->tecnico_superior,
            "tecnico_medio" => $request->tecnico_medio,
            "disciplina_ingenieria" => $request->disciplina_ingenieria,
            "doctorado" => $request->doctorado,
            "maestria" => $request->maestria,
            "especialidad" => $request->especialidad,
            "diplomado" => $request->diplomado,
            "c_carga_horaria" => $request->c_carga_horaria,
            "p_cada_mes" => $request->p_cada_mes,
            "p_cada_reconocimiento" => $request->p_cada_reconocimiento,
        ];

        if ($parametrizacion) {
            $parametrizacion->update($datos);
        } else {
            Parametrizacion::create($datos);
        }

        return redirect()->route('parametrizacions.index');
    }
}
