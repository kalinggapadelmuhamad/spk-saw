<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class DataAlternatifController extends Controller
{
    public function indexDataAlternatif()
    {
        $dataAlternatifs = Alternatif::orderBy('id', 'ASC')->get();
        $page            = 'alternatif';
        return view('alternatif.indexAlternatif', compact([
            'dataAlternatifs',
            'page'
        ]));
    }

    public function createDataAlternatif()
    {
        $page   = 'alternatif';
        return view('alternatif.createAlternatif', compact([
            'page'
        ]));
    }

    public function storeDataAlternatif(Request $request)
    {
        $request->validate([
            'nrp'   => 'required|min:5|max:5|unique:alternatifs',
            'nama'  => 'required'
        ]);

        Alternatif::create([
            'uuid'  => Str::uuid(),
            'nrp'   => $request->nrp,
            'nama'  => $request->nama
        ]);

        Alert::success('Berhasil', 'Alternatif berhasil di tambah');
        return Redirect::route('indexDataAlternatif');
    }

    public function editDataAlternatif(Alternatif $dataAlternatif)
    {
        $page   = 'alternatif';
        return view('alternatif.editAlternatif', compact([
            'page',
            'dataAlternatif'
        ]));
    }

    public function updateDataAlternatif(Request $request, Alternatif $dataAlternatif)
    {
        $request->validate([
            'nrp'   => 'required|min:5|unique:alternatifs,nrp,' . $dataAlternatif->id,
            'nama'  => 'required'
        ]);

        $dataAlternatif->update([
            'nrp'   => $request->nrp,
            'nama'  => $request->nama
        ]);

        Alert::success('Berhasil', 'Alternatif berhasil di ubah');
        return Redirect::route('indexDataAlternatif');
    }

    public function deleteDataAlternatif(Alternatif $dataAlternatif)
    {
        $dataAlternatif->delete();
        Alert::success('Berhasil', 'Alternatif berhasil di hapus');
        return Redirect::route('indexDataAlternatif');
    }
}
