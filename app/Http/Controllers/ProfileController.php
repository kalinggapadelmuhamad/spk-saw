<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function indexProfile()
    {
        $page = 'profile';
        return view('profile.indexProfile', compact(
            'page'
        ));
    }

    public function updateProfile(Request $request, User $user)
    {

        $request->validate([
            'nama'  => 'required|string',
            'email' => 'required|unique:users,email,' . Auth::user()->id
        ]);

        $user->update([
            'nama'  => $request->nama,
            'email' => $request->email
        ]);

        if ($request->password && $request->password_confirmation) {

            $request->validate([
                'password' => 'required|min:8|confirmed'
            ]);

            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        Alert::success('Berhasil', 'Profile berhasil di update');
        return Redirect::back();
    }
}
