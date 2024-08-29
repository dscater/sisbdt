<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $res = Auth::attempt(["email" => $request->email, "password" => $request->password]);
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
 
}