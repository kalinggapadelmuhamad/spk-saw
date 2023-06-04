<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    // Auth Login
    public function indexLogin()
    {
        return view('auth.login.indexLogin');
    }

    
    public function storeLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            Alert::success('Login berhasil', 'Selamat Datang ' . Auth::user()->nama);
            return Redirect::route('indexDashboard');
        }

        Alert::error('Error', 'Username atau password salah!');
        return Redirect::back();
    }

    // Auth Register
    public function indexDaftar()
    {
        return view('auth.daftar.indexDaftar');
    }

    public function storeDaftar(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string',
            'email'     => 'required|email|string|unique:users',
            'username'  => 'required|string|unique:users',
            'password'  => 'required|min:8'
        ]);

        User::create([
            'uuid'      => Str::uuid(),
            'username'  => $request->username,
            'password'  => bcrypt($request->password),
            'nama'      => $request->nama,
            'email'     => $request->email,
            'role'      => 'user'
        ]);

        Alert::success('Berhasil', 'Registrasi akun berhasil silahkan login');
        return Redirect::route('indexLogin');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::back();
    }
}
