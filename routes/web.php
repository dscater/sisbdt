<?php

use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\DatosOtroController;
use App\Http\Controllers\DatosPersonalController;
use App\Http\Controllers\EvaluacionCarreraController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ParametrizacionController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortalController::class, 'index'])->name('portal.index');

Route::get("/login", [LoginController::class, 'index'])->name("login");
Route::post("/login", [LoginController::class, 'login'])->name("login.store");
Route::post("/logout", [LoginController::class, 'logout'])->name("login.destroy");
Route::get("/register", [LoginController::class, 'register'])->name("register");
Route::post("/register", [LoginController::class, 'register_store'])->name("register.store");

Route::get("configuracions/getConfiguracion", [ConfiguracionController::class, 'getConfiguracion'])->name("configuracions.getConfiguracion");


Route::get("getCarreras", [EvaluacionCarreraController::class, 'getArrayCarreras']);

/* Usamos las funciones middleware, prefix y group
    middleware: lo que se ejecuta antes de acceder a una ruta, en este caso "auth" para verificar si existe una sesión iniciada
    prefix: indica que todas las rutas tendran la palabra "admin" por delante de su url especificada
    group: ayuda a que en todas las rutas que se encuentran dentro de esta se apliquen todas las demas funciones usadas como en este caso "middleware" y "prefix"
*/
Route::middleware('auth')->prefix("admin")->group(function () {
    // INICIO
    Route::get('/inicio', [InicioController::class, 'inicio'])->name('inicio');
    Route::get('/cantidadEstudiantesCarrera', [InicioController::class, 'cantidadEstudiantesCarrera'])->name('cantidadEstudiantesCarrera');

    // perfil
    Route::get('/perfil', [LoginController::class, 'perfil'])->name('perfil');
    Route::post('/perfil_password', [LoginController::class, 'perfil_password'])->name('perfil_password');
    Route::post('/perfil_foto', [LoginController::class, 'perfil_foto'])->name('perfil_foto');

    // CONFIGURACION
    Route::resource("configuracions", ConfiguracionController::class)->only(
        ["index", "show", "update"]
    );

    // USUARIO
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('profile/update_foto', [ProfileController::class, 'update_foto'])->name('profile.update_foto');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("getUser", [UserController::class, 'getUser'])->name('users.getUser');
    Route::get("permisos", [UserController::class, 'permisos']);

    // USUARIOS
    Route::put("usuarios/password/{user}", [UsuarioController::class, 'actualizaPassword'])->name("usuarios.password");
    Route::get("usuarios/paginado", [UsuarioController::class, 'paginado'])->name("usuarios.paginado");
    Route::get("usuarios/listado", [UsuarioController::class, 'listado'])->name("usuarios.listado");
    Route::get("usuarios/listado/byTipo", [UsuarioController::class, 'byTipo'])->name("usuarios.byTipo");
    Route::put("usuarios/update/{user}", [UsuarioController::class, 'update'])->name("usuarios.update");
    Route::get("usuarios/pdf/{usuario}", [UsuarioController::class, 'pdf'])->name("usuarios.pdf");
    Route::post("usuarios/destroy/{usuario}", [UsuarioController::class, 'destroy'])->name("usuarios.destroy");
    Route::resource("usuarios", UsuarioController::class)->only(
        [
            "index",
            "store",
            'show',
        ]
    );

    // PARAMETRIZACION
    // la funcion resource nos ayuda a definir las rutas que se usan normalmente para un CRUD(crear,modificar,mostrar,eliminar)
    // "only" nos permite indicar que funciones del CRUD usaremos
    Route::resource("parametrizacions", ParametrizacionController::class);

    // DATOS PERSONALES
    Route::resource("datos_personals", DatosPersonalController::class)->only([
        'index',
        'store',
    ]);

    // OTROS DATOS
    Route::resource("datos_otros", DatosOtroController::class)->only([
        'index',
        'store',
    ]);

    // EVALUACION
    Route::resource("evaluacions", EvaluacionController::class)->only([
        'index',
        'store',
    ]);

    // EVALUACION
    Route::resource("evaluacions", EvaluacionController::class)->only([
        'index',
        'store',
    ]);

    // POSTULANTES
    Route::get("postulantes", [UsuarioController::class, 'postulantes'])->name("postulantes");

    // REPORTES
    Route::get("reportes/postulantes", [ReporteController::class, 'postulantes'])->name("reportes.postulantes");
    Route::get("reportes/postulantes/pdf", [ReporteController::class, 'postulantes_pdf'])->name("reportes.postulantes_pdf");
});
// require __DIR__ . '/auth.php';
