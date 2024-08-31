<?php

namespace App\Http\Controllers;

use App\Models\DatosOtro;
use App\Models\Idioma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatosOtroController extends Controller
{
    public $validacion = [];

    public $mensajes = [];

    public function index()
    {
        $datos_otros = DatosOtro::where("user_id", Auth::user()->id)->get()->first();
        return view("DatosOtros.index", compact('datos_otros'));
    }

    public function store(Request $request)
    {
        $request['fecha_registro'] = date('Y-m-d');
        DB::beginTransaction();
        try {
            $datos_otro = DatosOtro::where("user_id", Auth::user()->id)->get()->first();
            // crear el Usuario
            if (!$datos_otro) {
                $datos_otro = DatosOtro::create([
                    "user_id" => Auth::user()->id,
                    "fecha_registro" => date("Y-m-d")
                ]);
            }

            // eliminados
            $eliminados_idioma = $request->eliminados_idioma;
            $eliminados_habilidad = $request->eliminados_habilidad;
            $eliminados_referencia = $request->eliminados_referencia;

            if ($eliminados_idioma && count($eliminados_idioma) > 0) {
                foreach ($eliminados_idioma as $item) {
                    $idioma = Idioma::find($item);
                    $idioma->delete();
                }
            }
            if ($eliminados_habilidad && count($eliminados_habilidad) > 0) {
                foreach ($eliminados_habilidad as $item) {
                    $idioma = Idioma::find($item);
                    $idioma->delete();
                }
            }
            if ($eliminados_referencia && count($eliminados_referencia) > 0) {
                foreach ($eliminados_referencia as $item) {
                    $idioma = Idioma::find($item);
                    $idioma->delete();
                }
            }

            // datos
            $idiomas = $request->idiomas;
            $habilidads = $request->habilidads;
            $referencias = $request->referencias;

            if ($idiomas && count($idiomas) > 0) {
                foreach ($idiomas as $idioma) {
                    $dataObject = json_decode($idioma);
                    $datos_otro->idiomas()->create([
                        "idioma" => mb_strtoupper($dataObject->idioma),
                        "nivel" => mb_strtoupper($dataObject->nivel),
                    ]);
                }
            }

            if ($habilidads && count($habilidads) > 0) {
                foreach ($habilidads as $habilidad) {
                    $dataObject = json_decode($habilidad);
                    $datos_otro->habilidads()->create([
                        "habilidad" => mb_strtoupper($dataObject->habilidad),
                    ]);
                }
            }

            if ($referencias && count($referencias) > 0) {
                foreach ($referencias as $referencia) {
                    $dataObject = json_decode($referencia);
                    $datos_otro->referencias()->create([
                        "nombre_ref" => mb_strtoupper($dataObject->nombre),
                        "cel_ref" => mb_strtoupper($dataObject->celular),
                        "correo_ref" => mb_strtoupper($dataObject->correo),
                        "cargo_ref" => mb_strtoupper($dataObject->cargo),
                        "relacion_ref" => mb_strtoupper($dataObject->relacion),
                        "descripcion" => mb_strtoupper($dataObject->descripcion),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route("datos_otros.index")->with("success", "Registro realizado");
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            DB::rollBack();
            return redirect()->route("datos_otros.index")->with("error", "Ocurrió un error al intentar realizar el registro");
        }
    }
}
