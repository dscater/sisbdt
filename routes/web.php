<?php

use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ParametrizacionController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortalController::class, 'index'])->name('portal.index');

Route::get("/login", [LoginController::class, 'index'])->name("login");
Route::post("/login", [LoginController::class, 'login'])->name("login.store");
Route::post("/logout", [LoginController::class, 'logout'])->name("login.destroy");
Route::get("/register", [LoginController::class, 'register'])->name("register");
Route::post("/register", [LoginController::class, 'register_store'])->name("register.store");

Route::get("configuracions/getConfiguracion", [ConfiguracionController::class, 'getConfiguracion'])->name("configuracions.getConfiguracion");

/* Usamos las funciones middleware, prefix y group
    middleware: lo que se ejecuta antes de acceder a una ruta, en este caso "auth" para verificar si existe una sesión iniciada
    prefix: indica que todas las rutas tendran la palabra "admin" por delante de su url especificada
    group: ayuda a que en todas las rutas que se encuentran dentro de esta se apliquen todas las demas funciones usadas como en este caso "middleware" y "prefix"
*/
Route::middleware('auth')->prefix("admin")->group(function () {
    // INICIO
    Route::get('/inicio', [InicioController::class, 'inicio'])->name('inicio');

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
    Route::get("usuarios/show/{user}", [UsuarioController::class, 'show'])->name("usuarios.show");
    Route::put("usuarios/update/{user}", [UsuarioController::class, 'update'])->name("usuarios.update");
    Route::delete("usuarios/{user}", [UsuarioController::class, 'destroy'])->name("usuarios.destroy");
    Route::resource("usuarios", UsuarioController::class)->only(
        ["index", "store"]
    );

    // PARAMETRIZACION
    // la funcion resource nos ayuda a definir las rutas que se usan normalmente para un CRUD(crear,modificar,mostrar,eliminar)
    // "only" nos permite indicar que funciones del CRUD usaremos
    Route::resource("parametrizacions", ParametrizacionController::class)->only(
        ["index", "store", "update", "show", "destroy"]
    );

    // REPORTES
});
// require __DIR__ . '/auth.php';
