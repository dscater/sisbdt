<?php

namespace App\Http\Controllers;

use App\Models\Cualidad;
use App\Models\DatosOtro;
use App\Models\Evaluacion;
use App\Models\EvaluacionBasica;
use App\Models\EvaluacionCarrera;
use App\Models\EvaluacionCurso;
use App\Models\EvaluacionDistincion;
use App\Models\EvaluacionLaboral;
use App\Models\EvaluacionPostgrado;
use App\Models\Habilidad;
use App\Models\Idioma;
use App\Models\Parametrizacion;
use App\Models\Referencia;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EvaluacionController extends Controller
{
    public $validacion = [];

    public $mensajes = [];

    public function index()
    {
        $evaluacion = Evaluacion::where("user_id", Auth::user()->id)->get()->first();
        $datos_otro = DatosOtro::where("user_id", Auth::user()->id)->get()->first();
        $array_carreras = EvaluacionCarrera::getCarreras();
        $html_option_carreras = "";
        foreach ($array_carreras as $carrera) {
            if ($carrera["grupo"] == "si") {
                $html_option_carreras .= '<optgroup label="' . $carrera['label'] . '">';
                foreach ($carrera["datos"] as $dato) {
                    $html_option_carreras .= '<option value="' . $dato['value'] . '">' . $dato['value'] . '</option>';
                }
                $html_option_carreras .= '</optgroup>';
            } else {
                $html_option_carreras .= '<option value="' . $carrera['value'] . '">' . $carrera['label'] . '</option>';
            }
        }
        // return $array_carreras;
        return view("Evaluacions.index", compact('evaluacion', 'datos_otro', 'array_carreras', 'html_option_carreras'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // EVALUACION
            $evaluacion = Evaluacion::where("user_id", Auth::user()->id)->get()->first();
            if (!$evaluacion) {
                $evaluacion = Evaluacion::create([
                    "user_id" => Auth::user()->id,
                    "fecha_registro" => date("Y-m-d")
                ]);
            }

            $parametrizacion = Parametrizacion::first();
            $total_evaluacion = 0;

            self::regPas1($request, $evaluacion, $parametrizacion, $total_evaluacion);
            self::regPas2($request, $evaluacion, $parametrizacion, $total_evaluacion);
            self::regPas3($request, $evaluacion, $parametrizacion, $total_evaluacion);
            self::regPas4($request, $evaluacion, $parametrizacion, $total_evaluacion);
            self::regPas5($request, $evaluacion, $parametrizacion, $total_evaluacion);
            self::regPas6($request, $evaluacion, $parametrizacion, $total_evaluacion);


            $evaluacion->puntuacion = $total_evaluacion;
            $evaluacion->save();

            // OTROS DATOS
            $datos_otro = DatosOtro::where("user_id", Auth::user()->id)->get()->first();
            // crear el Usuario
            if (!$datos_otro) {
                $datos_otro = DatosOtro::create([
                    "user_id" => Auth::user()->id,
                    "fecha_registro" => date("Y-m-d")
                ]);
            }
            // datos
            self::regPas7($request, $datos_otro);
            self::regPas8($request, $datos_otro);
            self::regPas9($request, $datos_otro);
            self::regPas10($request, $datos_otro);

            DB::commit();
            return response()->JSON([
                "message" => "Registro realizado correctamente"
            ]);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            DB::rollBack();

            return response()->JSON([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public static function regPas1($request, Evaluacion $evaluacion, $parametrizacion, &$total_evaluacion)
    {
        $fb_ids = $request->fb_ids;
        $fb_nivels = $request->fb_nivels;
        $fb_grados = $request->fb_grados;
        $fb_institucions = $request->fb_institucions;
        $fb_eliminados = $request->fb_eliminados;

        if ($fb_eliminados && count($fb_eliminados)) {
            foreach ($fb_eliminados as $id_eliminado) {
                $fb = EvaluacionBasica::find($id_eliminado);
                $fb->delete();
            }
        }

        if ($fb_ids && count($fb_ids) > 0) {
            for ($i = 0; $i < count($fb_ids); $i++) {
                if ($fb_nivels[$i] && $fb_grados[$i] && $fb_institucions[$i]) {
                    $datos = [
                        "nivel" => mb_strtoupper($fb_nivels[$i]),
                        "grado" => mb_strtoupper($fb_grados[$i]),
                        "institucion" => mb_strtoupper($fb_institucions[$i]),
                    ];

                    // sumar puntuacion
                    if ($parametrizacion) {
                        switch ($datos["grado"]) {
                            case 'PRIMARIA':
                                $total_evaluacion += (float)$parametrizacion->primaria;
                                break;
                            case 'SECUNDARIA':
                                $total_evaluacion += (float)$parametrizacion->secundaria;
                                break;
                            case 'BACHILLER':
                                $total_evaluacion += (float)$parametrizacion->bachiller;
                                break;
                        }
                    }
                    // fin suma puntuacion

                    if ($fb_ids[$i] != 0) {
                        $fb = EvaluacionBasica::findOrFail($fb_ids[$i]);
                        $fb->update($datos);
                    } else {
                        $evaluacion->evaluacion_basicas()->create($datos);
                    }
                }
            }
        }

        return true;
    }

    public static function regPas2($request, Evaluacion $evaluacion, $parametrizacion, &$total_evaluacion)
    {
        $ec_ids = $request->ec_ids;
        $ec_titulos = $request->ec_titulos;
        $ec_carreras = $request->ec_carreras;
        $ec_institucions = $request->ec_institucions;
        $ec_nivels = $request->ec_nivels;
        $ec_fecha_titulos = $request->ec_fecha_titulos;
        $ec_estados = $request->ec_estados;
        $ec_disciplinas = $request->ec_disciplinas;
        $ec_eliminados = $request->ec_eliminados;

        if ($ec_eliminados && count($ec_eliminados)) {
            foreach ($ec_eliminados as $id_eliminado) {
                $ec = EvaluacionCarrera::find($id_eliminado);
                $ec->delete();
            }
        }

        if ($ec_ids) {
            for ($i = 0; $i < count($ec_ids); $i++) {
                if ($ec_titulos[$i] && $ec_carreras[$i] && $ec_institucions[$i] && $ec_nivels[$i] && $ec_fecha_titulos[$i] && $ec_estados[$i] && $ec_disciplinas[$i]) {
                    $datos = [
                        "titulo" => mb_strtoupper($ec_titulos[$i]),
                        "carrera" => mb_strtoupper($ec_carreras[$i]),
                        "institucion" => mb_strtoupper($ec_institucions[$i]),
                        "nivel" => mb_strtoupper($ec_nivels[$i]),
                        "fecha_titulo" => mb_strtoupper($ec_fecha_titulos[$i]),
                        "estado" => mb_strtoupper($ec_estados[$i]),
                        "disciplina" => mb_strtoupper($ec_disciplinas[$i]),
                    ];

                    // sumar puntuacion
                    if ($parametrizacion) {
                        switch ($datos["estado"]) {
                            case 'TITULADO':
                                $total_evaluacion += (float)$parametrizacion->titulado;
                                break;
                            case 'EGRESADO':
                                $total_evaluacion += (float)$parametrizacion->egresado;
                                break;
                            case 'EN CURSO':
                                $total_evaluacion += (float)$parametrizacion->en_curso;
                                break;
                            case 'TÉCNICO SUPERIOR':
                                $total_evaluacion += (float)$parametrizacion->tecnico_superior;
                                break;
                            case 'TÉCNICO MEDIO':
                                $total_evaluacion += (float)$parametrizacion->tecnico_medio;
                                break;
                        }
                        if ($datos["disciplina"] == 'INGENIERIA') {
                            $total_evaluacion += (float)$parametrizacion->disciplina_ingenieria;
                        }
                    }
                    // fin suma puntuacion

                    if ($ec_ids[$i] != 0) {
                        $ec = EvaluacionCarrera::find($ec_ids[$i]);
                        $ec->update($datos);
                    } else {
                        $evaluacion->evaluacion_carreras()->create($datos);
                    }
                }
            }
        }
        return true;
    }

    public static function regPas3($request, Evaluacion $evaluacion, $parametrizacion, &$total_evaluacion)
    {
        $fp_ids = $request->ec_ids;
        $fp_institucions = $request->fp_institucions;
        $fp_fecha_postgrados = $request->fp_fecha_postgrados;
        $fp_titulos = $request->fp_titulos;
        $fp_nivels = $request->fp_nivels;
        $fp_postgrados = $request->fp_postgrados;
        $fp_eliminados = $request->fp_eliminados;

        if ($fp_eliminados && count($fp_eliminados)) {
            foreach ($fp_eliminados as $id_eliminado) {
                $fp = EvaluacionPostgrado::find($id_eliminado);
                $fp->delete();
            }
        }

        if ($fp_ids) {
            for ($i = 0; $i < count($fp_ids); $i++) {
                if ($fp_institucions[$i] && $fp_fecha_postgrados[$i] && $fp_titulos[$i] && $fp_nivels[$i] && $fp_postgrados[$i]) {
                    $datos = [
                        "institucion" => mb_strtoupper($fp_institucions[$i]),
                        "fecha_postgrado" => mb_strtoupper($fp_fecha_postgrados[$i]),
                        "titulo" => mb_strtoupper($fp_titulos[$i]),
                        "nivel" => mb_strtoupper($fp_nivels[$i]),
                        "postgrado" => mb_strtoupper($fp_postgrados[$i]),
                    ];

                    // sumar puntuacion
                    if ($parametrizacion) {
                        switch ($datos["postgrado"]) {
                            case 'DOCTORADO':
                                $total_evaluacion += (float)$parametrizacion->doctorado;
                                break;
                            case 'MAESTRÍA':
                                $total_evaluacion += (float)$parametrizacion->maestria;
                                break;
                            case 'ESPECIALIDAD':
                                $total_evaluacion += (float)$parametrizacion->especialidad;
                                break;
                            case 'DIPLOMADO':
                                $total_evaluacion += (float)$parametrizacion->diplomado;
                                break;
                        }
                    }
                    // fin suma puntuacion

                    if ($fp_ids[$i] != 0) {
                        $fp = EvaluacionPostgrado::find($fp_ids[$i]);
                        $fp->update($datos);
                    } else {
                        $evaluacion->evaluacion_postgrados()->create($datos);
                    }
                }
            }
        }
        return true;
    }

    public static function regPas4($request, Evaluacion $evaluacion, $parametrizacion, &$total_evaluacion)
    {
        $ecur_ids = $request->ecur_ids;
        $ecur_nombres = $request->ecur_nombres;
        $ecur_institucions = $request->ecur_institucions;
        $ecur_fechas = $request->ecur_fechas;
        $ecur_carga_horarias = $request->ecur_carga_horarias;
        $ecur_eliminados = $request->ecur_eliminados;

        if ($ecur_eliminados && count($ecur_eliminados)) {
            foreach ($ecur_eliminados as $id_eliminado) {
                $ecur = EvaluacionCurso::find($id_eliminado);
                $ecur->delete();
            }
        }

        if ($ecur_ids) {
            for ($i = 0; $i < count($ecur_ids); $i++) {
                if ($ecur_nombres[$i] && $ecur_institucions[$i] && $ecur_fechas[$i] && $ecur_carga_horarias[$i]) {
                    $datos = [
                        "nombre" => mb_strtoupper($ecur_nombres[$i]),
                        "institucion" => mb_strtoupper($ecur_institucions[$i]),
                        "fecha" => mb_strtoupper($ecur_fechas[$i]),
                        "carga_horaria" => mb_strtoupper($ecur_carga_horarias[$i]),
                    ];

                    // sumar puntuacion
                    if ($parametrizacion) {
                        if ((float)$datos["carga_horaria"] > 0 && $parametrizacion->c_carga_horaria > 0) {
                            $total_evaluacion += (float)$datos["carga_horaria"] * $parametrizacion->c_carga_horaria;
                        }
                    }
                    // fin suma puntuacion

                    if ($ecur_ids[$i] != 0) {
                        Log::debug($ecur_ids[$i]);
                        Log::debug("AAAAAAAAAAAAAA");
                        $ecur = EvaluacionCurso::find($ecur_ids[$i]);
                        $ecur->update($datos);
                    } else {
                        $evaluacion->evaluacion_cursos()->create($datos);
                    }
                }
            }
        }
        return true;
    }

    public static function regPas5($request, Evaluacion $evaluacion, $parametrizacion, &$total_evaluacion)
    {
        $el_ids = $request->el_ids;
        $el_cargos = $request->el_cargos;
        $el_institucions = $request->el_institucions;
        $el_fecha_inis = $request->el_fecha_inis;
        $el_fecha_fins = $request->el_fecha_fins;
        $el_descripcions = $request->el_descripcions;
        $el_eliminados = $request->el_eliminados;

        if ($el_eliminados && count($el_eliminados)) {
            foreach ($el_eliminados as $id_eliminado) {
                $el = EvaluacionLaboral::find($id_eliminado);
                $el->delete();
            }
        }

        if ($el_ids) {
            for ($i = 0; $i < count($el_ids); $i++) {
                if ($el_cargos[$i] && $el_institucions[$i] && $el_fecha_inis[$i] && $el_fecha_fins[$i] && $el_descripcions[$i]) {
                    $datos = [
                        "cargo" => mb_strtoupper($el_cargos[$i]),
                        "institucion" => mb_strtoupper($el_institucions[$i]),
                        "fecha_ini" => $el_fecha_inis[$i],
                        "fecha_fin" => $el_fecha_fins[$i],
                        "descripcion" => mb_strtoupper($el_descripcions[$i]),
                    ];

                    // sumar puntuacion
                    if ($parametrizacion) {
                        $diff_meses = self::obtenerDiferenciaMeses($datos["fecha_ini"], $datos["fecha_fin"]);
                        if ($diff_meses > 0) {
                            $total_evaluacion += (float)$diff_meses * $parametrizacion->p_cada_mes;
                        }
                    }
                    // fin suma puntuacion

                    if ($el_ids[$i] != 0) {
                        $el = EvaluacionLaboral::find($el_ids[$i]);
                        $el->update($datos);
                    } else {
                        $evaluacion->evaluacion_laborals()->create($datos);
                    }
                }
            }
        }
        return true;
    }

    public static function regPas6($request, Evaluacion $evaluacion, $parametrizacion, &$total_evaluacion)
    {
        $ed_ids = $request->ed_ids;
        $ed_meritos = $request->ed_meritos;
        $ed_institucions = $request->ed_institucions;
        $ed_fechas = $request->ed_fechas;
        $ed_eliminados = $request->ed_eliminados;

        if ($ed_eliminados && count($ed_eliminados)) {
            foreach ($ed_eliminados as $id_eliminado) {
                $el = EvaluacionDistincion::find($id_eliminado);
                $el->delete();
            }
        }

        if ($ed_ids) {
            $contador = 0;
            for ($i = 0; $i < count($ed_ids); $i++) {
                if (
                    $ed_meritos[$i] && $ed_institucions[$i] && $ed_fechas[$i]
                ) {
                    $datos = [
                        "merito" => mb_strtoupper($ed_meritos[$i]),
                        "institucion" => mb_strtoupper($ed_institucions[$i]),
                        "fecha" => $ed_fechas[$i],
                    ];

                    if ($ed_ids[$i] != 0) {
                        $el = EvaluacionDistincion::find($ed_ids[$i]);
                        $el->update($datos);
                    } else {
                        $evaluacion->evaluacion_distincions()->create($datos);
                    }
                }
                $contador++;
            }
        }

        // sumar puntuacion
        if ($parametrizacion) {
            if ($contador > 0) {
                $total_evaluacion += (float)$contador * $parametrizacion->p_cada_reconocimiento;
            }
        }
        // fin suma puntuacion

        return true;
    }

    // OTROS DATOS
    public static function regPas7($request, DatosOtro $datos_otro)
    {
        $id_ids = $request->id_ids;
        $id_idioma = $request->id_idioma;
        $id_nivel = $request->id_nivel;
        $id_eliminados = $request->id_eliminados;

        if ($id_eliminados && count($id_eliminados)) {
            foreach ($id_eliminados as $id_eliminado) {
                $id = Idioma::find($id_eliminado);
                $id->delete();
            }
        }

        if ($id_ids) {
            for ($i = 0; $i < count($id_ids); $i++) {
                if ($id_idioma[$i] && $id_nivel[$i]) {
                    $datos = [
                        "idioma" => mb_strtoupper($id_idioma[$i]),
                        "nivel" => mb_strtoupper($id_nivel[$i]),
                    ];

                    if ($id_ids[$i] != 0) {
                        $id = Idioma::find($id_ids[$i]);
                        $id->update($datos);
                    } else {
                        $datos_otro->idiomas()->create($datos);
                    }
                }
            }
        }
        return true;
    }
    public static function regPas8($request, DatosOtro $datos_otro)
    {
        $hab_ids = $request->hab_ids;
        $hab_habilidads = $request->hab_habilidads;
        $hab_eliminados = $request->hab_eliminados;

        if ($hab_eliminados && count($hab_eliminados)) {
            foreach ($hab_eliminados as $hab_eliminado) {
                $hab = Habilidad::find($hab_eliminado);
                $hab->delete();
            }
        }

        if ($hab_ids) {
            for ($i = 0; $i < count($hab_ids); $i++) {
                if ($hab_habilidads[$i]) {
                    $datos = [
                        "habilidad" => mb_strtoupper($hab_habilidads[$i]),
                    ];
                    if ($hab_ids[$i] != 0) {
                        $hab = Habilidad::find($hab_ids[$i]);
                        $hab->update($datos);
                    } else {
                        $datos_otro->habilidads()->create($datos);
                    }
                }
            }
        }
        return true;
    }
    public static function regPas9($request, DatosOtro $datos_otro)
    {
        $cua_ids = $request->cua_ids;
        $cua_cualidads = $request->cua_cualidads;
        $cua_eliminados = $request->cua_eliminados;

        if ($cua_eliminados && count($cua_eliminados)) {
            foreach ($cua_eliminados as $cua_eliminado) {
                $cua = Cualidad::find($cua_eliminado);
                $cua->delete();
            }
        }

        if ($cua_ids) {
            for ($i = 0; $i < count($cua_ids); $i++) {
                if ($cua_cualidads[$i]) {
                    $datos = [
                        "cualidad" => mb_strtoupper($cua_cualidads[$i]),
                    ];
                    if ($cua_ids[$i] != 0) {
                        $cua = Cualidad::find($cua_ids[$i]);
                        $cua->update($datos);
                    } else {
                        $datos_otro->cualidads()->create($datos);
                    }
                }
            }
        }
        return true;
    }

    public static function regPas10($request, DatosOtro $datos_otro)
    {
        $ref_ids = $request->ref_ids;
        $ref_nombre_refs = $request->ref_nombre_refs;
        $ref_cel_refs = $request->ref_cel_refs;
        $ref_correo_refs = $request->ref_correo_refs;
        $ref_cargo_refs = $request->ref_cargo_refs;
        $ref_relacion_refs = $request->ref_relacion_refs;
        $ref_descripcions = $request->ref_descripcions;
        $ref_eliminados = $request->ref_eliminados;

        if ($ref_eliminados && count($ref_eliminados)) {
            foreach ($ref_eliminados as $ref_eliminado) {
                $ref = Referencia::find($ref_eliminado);
                $ref->delete();
            }
        }

        if ($ref_ids) {
            for ($i = 0; $i < count($ref_ids); $i++) {
                if ($ref_nombre_refs[$i] && $ref_cel_refs[$i] && $ref_correo_refs[$i] && $ref_cargo_refs[$i] && $ref_cargo_refs[$i] && $ref_descripcions[$i]) {
                    $datos = [
                        "nombre_ref" => mb_strtoupper($ref_nombre_refs[$i]),
                        "cel_ref" => mb_strtoupper($ref_cel_refs[$i]),
                        "correo_ref" => mb_strtoupper($ref_correo_refs[$i]),
                        "cargo_ref" => mb_strtoupper($ref_cargo_refs[$i]),
                        "relacion_ref" => mb_strtoupper($ref_relacion_refs[$i]),
                        "descripcion" => mb_strtoupper($ref_descripcions[$i]),
                    ];
                    if ($ref_ids[$i] != 0) {
                        $ref = Referencia::find($ref_ids[$i]);
                        $ref->update($datos);
                    } else {
                        $datos_otro->referencias()->create($datos);
                    }
                }
            }
        }
        return true;
    }


    // otras funciones
    public static function obtenerDiferenciaMeses($fechaInicio, $fechaFin)
    {
        // Crear objetos DateTime a partir de las fechas proporcionadas
        $inicio = new DateTime($fechaInicio);
        $fin = new DateTime($fechaFin);

        // Obtener la diferencia entre las dos fechas como un objeto DateInterval
        $diferencia = $inicio->diff($fin);

        // Calcular el total de meses (años * 12 + meses)
        $totalMeses = ($diferencia->y * 12) + $diferencia->m;

        // Si la fecha de inicio es mayor que la fecha de fin, la diferencia será negativa
        if ($inicio > $fin) {
            $totalMeses = -$totalMeses;
        }

        return $totalMeses;
    }
}
