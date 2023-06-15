<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function indexUser()
    {
        $page  = 'user';
        $users = User::latest()->get();

        return view('user.indexUser', compact(
            'users',
            'page'
        ));
    }

    public function createUser()
    {
        $page  = 'user';

        return view('user.createUser', compact(
            'page'
        ));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string',
            'email'     => 'required|email|string|unique:users',
            'nrp'       => 'required|min:5|unique:users',
            'password'  => 'required|min:8|confirmed',
            'role'      => 'required|string'
        ]);

        User::create([
            'uuid'      => Str::uuid(),
            'nrp'       => $request->nrp,
            'password'  => bcrypt($request->password),
            'nama'      => $request->nama,
            'email'     => $request->email,
            'role'      => $request->role,
            'status'    => 1
        ]);

        Alert::success('Berhasil', 'Data user berhasil ditambah');
        return Redirect::route('indexUser');
    }

    public function editUser(User $user)
    {
        $page  = 'user';

        return view('user.userEdit', compact(
            'page',
            'user'
        ));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'nama'      => 'required|string',
            'email'     => 'required|unique:users,email,' . $user->id,
            'status'    => 'required'
        ]);

        $user->update([
            'nama'   => $request->nama,
            'email'  => $request->email,
            'status' => $request->status
        ]);

        if ($request->password && $request->password_confirmation) {

            $request->validate([
                'password' => 'required|min:8|confirmed'
            ]);

            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        Alert::success('Berhasil', 'Data user berhasil diupdate');
        return Redirect::back();
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        Alert::success('Berhasil', 'Data user berhasil dihapus');
        return Redirect::back();
    }
}
