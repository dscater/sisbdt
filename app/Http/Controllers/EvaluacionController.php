<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluacionController extends Controller
{
    public $validacion = [];

    public $mensajes = [];

    public function index()
    {
        $evaluacion = Evaluacion::where("user_id", Auth::user()->id)->get()->first();
        return view("Evaluacions.index", compact('evaluacion'));
    }

    public function store(Request $request) {}
}
