<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('Login.login');
    }
    public function postLogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }
        return redirect('/login')->with('status', 'Email atau Password Salah');;
    }
    public function register()
    {
        return view('Login.register');
    }
    public function postRegister(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect('login')->with('status', 'Data Berhasil Disimpan');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
