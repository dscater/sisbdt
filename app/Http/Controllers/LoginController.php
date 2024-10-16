<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $res = Auth::attempt(["email" => $request->email, "password" => $request->password, "status" => 1]);
        if ($res) {
            return redirect()->route("inicio");
        }
        return redirect()->back()->withErrors([
            "email" => "El usuario o contraseña son incorrectos"
        ])->withInput(["email" => $request->email]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        if ($request->ajax()) {
            return response()->JSON(true);
        }
        return redirect()->route("login");
    }

    public function register()
    {
        return view("auth.register");
    }
    public function register_store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'nombres' => mb_strtoupper($request->nombres),
            'apellidos' => mb_strtoupper($request->apellidos),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "tipo" => "POSTULANTE",
            "fecha_registro" => date("Y-m-d")
        ]);

        // event(new Registered($user));

        Auth::login($user);

        return redirect()->route('datos_personals.index')->with("success", "Registro éxitoso");
    }

    public function perfil()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->tipo == 'POSTULANTE') {
                return view("Auth.perfil", compact("user"));
            }
            return view("Auth.perfil_admin", compact("user"));
        } else {
            return redirect()->route("inicio");
        }
    }

    public function perfil_foto(Request $request)
    {
        if ($request->hasFile('foto')) {
            $antiguo = Auth::user()->foto;
            if ($antiguo && $antiguo != 'default.png') {
                \File::delete(public_path() . '/imgs/users/' . $antiguo);
            }
            $file = $request->foto;
            $nom_foto = time() . '_' . Auth::user()->id . '.' . $file->getClientOriginalExtension();
            Auth::user()->foto = $nom_foto;
            $file->move(public_path() . '/imgs/users/', $nom_foto);

            Auth::user()->foto = $nom_foto;
            Auth::user()->save();
        }

        return redirect()->route("perfil")->with("success", "Registro realizado");
    }

    public function perfil_password(Request $request)
    {
        $request->validate([
            'oldPassword' => ['required'],
            'password' => ['required', 'confirmed'],
        ], [
            'oldPassword.required' => "Completa este campo",
            'password.required' => "Completa este campo",
            'password.confirmed' => "La contraseña no coincide",
        ]);

        $user = Auth::user();
        if ($request->oldPassword) {
            if (Hash::check($request->oldPassword, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('perfil')->with('success', 'Contraseña actualizada');
            } else {
                return redirect()->route('perfil')->with('error', 'La contraseña antigua es incorrecta');
            }
        }
    }
}
