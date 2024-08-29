<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InicioController extends Controller
{
    public function inicio()
    {
        $array_infos = UserController::getInfoBoxUser();
        return view('Home', compact('array_infos'));
    }
}
