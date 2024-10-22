<?php

namespace App\Http\Controllers;

use App\Models\DatosPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatosPersonalController extends Controller
{
    public $validacion = [
        "tipo_ci" => "required",
        "nro_ci" => "required|numeric",
        "fecha_nacimiento" => "required|date",
        "lugar_nacimiento" => "required|regex:/^[\pL\s\.\'\"\,0-9áéíóúÁÉÍÓÚñÑ]+$/u",
        "genero" => "required",
        "fono" => "required|numeric",
        "dir" => "required|regex:/^[\pL\s\.\'\"\,0-9áéíóúÁÉÍÓÚñÑ]+$/u",
    ];

    public $mensajes = [
        "tipo_ci.required" => "Este campo es obligatorio",
        "nro_ci.required" => "Este campo es obligatorio",
        "nro_ci.numeric" => "Debes ingresar un valor númerico",
        "fecha_nacimiento.required" => "Este campo es obligatorio",
        "fecha_nacimiento.date" => "Debes ingresar una fecha valida",
        "lugar_nacimiento.required" => "Este campo es obligatorio",
        "lugar_nacimiento.regex" => "El formato ingresado es incorrecto",
        "genero.required" => "Este campo es obligatorio",
        "foto.required" => "Este campo es obligatorio",
        "fono.required" => "Este campo es obligatorio",
        "fono.numeric" => "Debes ingresar un valor númerico",
        "dir.required" => "Este campo es obligatorio",
        "dir.regex" => "El formato ingresado es incorrecto",
        "hoja_vida.required" => "Este campo es obligatorio",
    ];

    public function index()
    {
        $datos_personal = DatosPersonal::where("user_id", Auth::user()->id)->get()->first();
        return view("DatosPersonals.index", compact('datos_personal'));
    }


    public function store(Request $request)
    {
        $datos_personal = DatosPersonal::where("user_id", Auth::user()->id)->get()->first();
        if (!$datos_personal) {
            $this->validacion['foto'] = 'required|image|mimes:jpeg,jpg,png|max:4096';
            $this->validacion['hoja_vida'] = 'required|file|mimes:pdf';
        }
        $request->validate($this->validacion, $this->mensajes);

        $request['fecha_registro'] = date('Y-m-d');
        DB::beginTransaction();
        try {
            if (!$datos_personal) {
                $request['user_id'] = Auth::user()->id;
                // crear el Usuario
                $datos_personal = DatosPersonal::create(array_map('mb_strtoupper', $request->except('foto', 'hoja_vida')));
            } else {
                $datos_personal->update(array_map('mb_strtoupper', $request->except('foto', 'hoja_vida')));
            }
            if ($request->hasFile('foto')) {
                $antiguo = $datos_personal->foto;
                if ($antiguo && $antiguo != 'default.png') {
                    \File::delete(public_path() . '/imgs/' . $antiguo);
                }
                $file = $request->foto;
                $nom_foto = time() . '_' . $datos_personal->id . '.' . $file->getClientOriginalExtension();
                $datos_personal->foto = $nom_foto;
                $file->move(public_path() . '/imgs/', $nom_foto);
            }

            if ($request->hasFile('hoja_vida')) {
                $antiguo = $datos_personal->hoja_vida;
                if ($antiguo && $antiguo != 'default.png') {
                    \File::delete(public_path() . '/imgs/' . $antiguo);
                }
                $file = $request->hoja_vida;
                $nom_hoja_vida = time() . '_' . $datos_personal->id . '.' . $file->getClientOriginalExtension();
                $datos_personal->hoja_vida = $nom_hoja_vida;
                $file->move(public_path() . '/files/', $nom_hoja_vida);
            }

            $datos_personal->save();

            DB::commit();
            // return redirect()->route("datos_personals.index")->with("success", "Registro realizado");
            return redirect()->route("evaluacions.index")->with("success", "Registro realizado");
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            DB::rollBack();
            return redirect()->route("datos_personals.index")->with("error", "Ocurrió un error al intentar realizar el registro");
        }
    }
}
