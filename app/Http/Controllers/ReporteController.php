<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionCarrera;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class ReporteController extends Controller
{
    public function postulantes()
    {
        $array_carreras = EvaluacionCarrera::getCarreras();
        $html_option_carreras = "";
        foreach ($array_carreras as $carrera) {
            if ($carrera["grupo"] == "si") {
                $html_option_carreras .= '<optgroup label="' . $carrera['label'] . '">';
                foreach ($carrera["datos"] as $dato) {
                    $html_option_carreras .= '<option value="' . $dato['value'] . '">' . $dato['value'] . '</option>';
                }
                $html_option_carreras .= '</optgroup>';
            }
        }

        return view("reportes.postulantes", compact("array_carreras", 'html_option_carreras'));
    }

    public function postulantes_pdf(Request $request)
    {
        $carrera =  $request->carrera;
        $fecha_ini =  $request->fecha_ini;
        $fecha_fin =  $request->fecha_fin;
        $usuarios = User::select("users.*")
            ->distinct()
            ->join("evaluacions", "evaluacions.user_id", "=", "users.id")
            ->join("evaluacion_carreras", "evaluacion_carreras.evaluacion_id", "=", "evaluacions.id");
        if ($carrera != 'todos') {
            $usuarios->where("carrera", $carrera);
        }

        if ($fecha_ini && $fecha_fin) {
            $usuarios->whereBetween("evaluacions.fecha_registro", [$fecha_ini, $fecha_fin]);
        }

        $usuarios->where("status", 1);
        $usuarios->where("tipo", "POSTULANTE");
        $usuarios = $usuarios->get();

        $pdf = PDF::loadView('reportes.pdf.postulantes', compact('usuarios'))->setPaper('legal', 'landscape');

        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 9, array(0, 0, 0));

        return $pdf->stream('postulantes.pdf');
    }
}
