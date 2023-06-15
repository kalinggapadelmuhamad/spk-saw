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
            'nrp'       => 'required|min:5',
            'password'  => 'required'
        ]);

        $credentials = $request->only('nrp', 'password');
        if (Auth::attempt($credentials)) {

            $isActive = Auth::user()->status;
            if ($isActive) {

                Alert::success('Login berhasil', 'Selamat Datang ' . Auth::user()->nama);
                return Redirect::route('indexDashboard');
            }

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Alert::info('Login gagal', 'Akun belum di aktivasi');
            return Redirect::back();
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
            'nrp'       => 'required|min:5|unique:users',
            'password'  => 'required|min:8'
        ]);

        User::create([
            'uuid'      => Str::uuid(),
            'nrp'       => $request->nrp,
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
