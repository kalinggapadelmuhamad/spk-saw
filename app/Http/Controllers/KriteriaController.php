<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    public function indexKriteria()
    {
        $kriterias  = Kriteria::latest()->get();
        $page       = 'kriteria';
        return view('kriteria.indexKriteria', compact(
            'kriterias',
            'page'
        ));
    }

    public function createKriteria()
    {
        $page       = 'kriteria';
        return view('kriteria.createKriteria', compact(
            'page'
        ));
    }

    public function storeKriteria(Request $request)
    {
        $request->validate([
            'kode_kriteria' => 'required|unique:kriterias',
            'nama'          => 'required|unique:kriterias',
            'type'          => 'required',
            'bobot'         => 'required',
            // 'ada_pilihan'   => 'required',
        ]);

        Kriteria::create([
            'uuid'          => Str::uuid(),
            'kode_kriteria' => $request->kode_kriteria,
            'nama'          => $request->nama,
            'type'          => $request->type,
            'bobot'         => $request->bobot,
            // 'ada_pilihan'   => $request->ada_pilihan
        ]);

        Alert::success('Berhasil', 'Kriteria berhasil di tambah');
        return Redirect::route('indexKriteria');
    }

    public function editKriteria(Kriteria $kriteria)
    {
        $page       = 'kriteria';
        return view('kriteria.editKriteria', compact(
            'page',
            'kriteria'
        ));
    }

    public function updateKriteria(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'kode_kriteria' => 'required|string|unique:kriterias,kode_kriteria,' . $kriteria->id,
            'nama'          => 'required|string|unique:kriterias,nama,' . $kriteria->id,
            'type'          => 'required',
            'bobot'         => 'required',
            // 'ada_pilihan'   => 'required'
        ]);

        $kriteria->update([
            'kode_kriteria' => $request->kode_kriteria,
            'nama'          => $request->nama,
            'type'          => $request->type,
            'bobot'         => $request->bobot,
            // 'ada_pilihan'   => $request->ada_pilihan
        ]);

        Alert::success('Berhasil', 'Kriteria berhasil di ubah');
        return Redirect::route('indexKriteria');
    }

    public function deleteKriteria(Kriteria $kriteria)
    {
        $kriteria->delete();
        Alert::success('Berhasil', 'Kriteria berhasil di hapus');
        return Redirect::route('indexKriteria');
    }
}
