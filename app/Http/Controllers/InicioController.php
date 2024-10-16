<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionCarrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class InicioController extends Controller
{
    public function inicio()
    {
        $array_infos = UserController::getInfoBoxUser();
        if (Auth::user()->tipo != 'POSTULANTE') {
            return view('HomeAdmin', compact('array_infos'));
        }
        return view('Home', compact('array_infos'));
    }

    public function cantidadEstudiantesCarrera(Request $request)
    {
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $array_carreras = EvaluacionCarrera::getCarreras();

        $data = [];
        foreach ($array_carreras as $carrera) {
            if ($carrera["grupo"] == "si") {
                foreach ($carrera["datos"] as $dato) {
                    $total = EvaluacionCarrera::select("evaluacion_carreras.id")
                        ->join("evaluacions", "evaluacions.id", "=", "evaluacion_carreras.evaluacion_id")
                        ->join("users", "users.id", "=", "evaluacions.user_id")
                        ->where("carrera", $dato["value"])
                        ->where("status", 1)
                        ->whereBetween("evaluacions.fecha_registro", [$fecha_ini, $fecha_fin])->count();
                    $data[] = [$dato["value"], (float)$total];
                }
            }
        }


        return response()->JSON([
            "data" => $data
        ]);
    }
}
