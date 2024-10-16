<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PDF;


class UsuarioController extends Controller
{
    public function postulantes()
    {
        $usuarios = User::where("tipo", "POSTULANTE")->where("status", 1)->get();
        return view("postulantes.index", compact("usuarios"));
    }

    public function index()
    {
        $usuarios = User::with(["evaluacion"])->where("tipo", "POSTULANTE")->where("status", 1)->get();
        return response()->JSON(["data" => $usuarios]);
    }

    public function show(User $usuario)
    {
        if (Auth::user()->tipo == 'POSTULANTE') {
            return view("postulantes.show", compact("usuario"));
        }
        return view("postulantes.show_admin", compact("usuario"));
    }


    public function pdf(User $usuario)
    {
        $pdf = PDF::loadView('postulantes.pdf', compact('usuario'))->setPaper('letter', 'portrait');

        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 9, array(0, 0, 0));

        return $pdf->stream('evaluacion.pdf');
    }

    public function destroy(User $usuario)
    {
        $usuario->status = 0;
        $usuario->save();

        return response()->JSON(["sw" => true]);
    }
}
