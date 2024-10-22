<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\EvaluacionCarrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class InicioController extends Controller
{
    public function inicio()
    {

        $anio_actual = date("Y");
        $anio_men = Evaluacion::orderBy("fecha_registro", "asc")->get()->first();
        $anio_men = date("Y", strtotime($anio_men->fecha_registro));
        $anio_ma = Evaluacion::orderBy("fecha_registro", "desc")->get()->first();
        $anio_ma = date("Y", strtotime($anio_ma->fecha_registro));

        if ($anio_ma < $anio_actual) {
            $anio_ma =  $anio_actual;
        }

        $anios = [];
        for ($i = $anio_men; $i <= $anio_ma; $i++) {
            $anios[] = $i;
        }


        $meses = [
            "01" => "Enero",
            "02" => "Febrero",
            "03" => "Marzo",
            "04" => "Abril",
            "05" => "Mayo",
            "06" => "Junio",
            "07" => "Julio",
            "08" => "Agosto",
            "09" => "Septiembre",
            "10" => "Octubre",
            "11" => "Noviembre",
            "12" => "Diciembre",
        ];

        $array_infos = UserController::getInfoBoxUser();
        if (Auth::user()->tipo != 'POSTULANTE') {
            $array_carreras = EvaluacionCarrera::getCarreras();
            $html_option_carreras = '<option value="todos">TODOS</option>';
            foreach ($array_carreras as $carrera) {
                if ($carrera["grupo"] == "si") {
                    $html_option_carreras .= '<optgroup label="' . $carrera['label'] . '">';
                    foreach ($carrera["datos"] as $dato) {
                        $html_option_carreras .= '<option value="' . $dato['value'] . '">' . $dato['value'] . '</option>';
                    }
                    $html_option_carreras .= '</optgroup>';
                }
            }
            return view('HomeAdmin', compact('array_infos', 'anios', 'meses', 'html_option_carreras'));
        }

        return view('Home', compact('array_infos', 'anios', 'meses'));
    }

    public function cantidadEstudiantesCarrera(Request $request)
    {
        $carrera_id = $request->carrera_id;
        $anio = $request->anio;
        $mes = $request->mes;
        $array_carreras = EvaluacionCarrera::getCarreras();
        $fecha_b = $anio . '-' . $mes;
        $series = [];
        foreach ($array_carreras as $carrera) {
            if ($carrera["grupo"] == "si") {
                foreach ($carrera["datos"] as $dato) {
                    $carrera = mb_strtoupper($dato["value"]);
                    $carrera_filtro = mb_strtoupper($carrera_id);
                    $data = [];
                    if ($carrera_filtro != 'TODOS') {
                        if ($carrera_filtro == $carrera) {
                            $evaluacion_carreras = EvaluacionCarrera::select("evaluacion_carreras.*")
                                ->join("evaluacions", "evaluacions.id", "=", "evaluacion_carreras.evaluacion_id")
                                ->where("carrera", $carrera)
                                ->where("fecha_registro", "LIKE", "$fecha_b%")
                                ->orderBy("puntuacion", "desc")
                                ->get()
                                ->take(3);

                            foreach ($evaluacion_carreras as $ev_ca) {
                                $data[] = [
                                    "name" => $ev_ca->evaluacion->user->full_name,
                                    "y" => (float)$ev_ca->evaluacion->puntuacion
                                ];
                            }


                            $series[] = [
                                "name" => $carrera,
                                "data" => $data
                            ];
                        }
                    } else {
                        $evaluacion_carreras = EvaluacionCarrera::select("evaluacion_carreras.*")
                            ->join("evaluacions", "evaluacions.id", "=", "evaluacion_carreras.evaluacion_id")
                            ->where("carrera", $carrera)
                            ->where("fecha_registro", "LIKE", "$fecha_b%")
                            ->orderBy("puntuacion", "desc")
                            ->get()
                            ->take(3);

                        foreach ($evaluacion_carreras as $ev_ca) {
                            $data[] = [
                                "name" => $ev_ca->evaluacion->user->full_name,
                                "y" => (float)$ev_ca->evaluacion->puntuacion
                            ];
                        }


                        $series[] = [
                            "name" => $carrera,
                            "data" => $data
                        ];
                    }
                }
            }
        }


        return response()->JSON([
            "series" => $series
        ]);
    }
}
