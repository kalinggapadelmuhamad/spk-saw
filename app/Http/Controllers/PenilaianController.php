<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\SubKriteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianController extends Controller
{
    public function indexPenilaian()
    {
        $dataKriterias   = Kriteria::latest()->get();
        $dataKriterias->load('SubKriteria');
        $dataAlternatifs = Alternatif::latest()->get();

        $page            = 'penilaian';
        return view('penilaian.indexPenilaian', compact(
            'page',
            'dataAlternatifs',
            'dataKriterias'
        ));
    }

    public function storePenilaian(Request $request, Alternatif $alternatif)
    {

        $request->validate([
            'kriteria_id'   => 'required',
            'nilai'         => 'required'
        ]);

        $i = 0;
        foreach ($request->nilai as $idSubkriteria) {
            $nilai = SubKriteria::where('id', $idSubkriteria)->value('nilai');
            Penilaian::create([
                'uuid'              => Str::uuid(),
                'user_id'           => Auth::user()->id,
                'alternatif_id'     => $alternatif->id,
                'kriteria_id'       => $request->kriteria_id[$i],
                'sub_kriteria_id'   => $idSubkriteria,
                'nilai'             => $nilai
            ]);
            $i++;
        }

        Alert::success('Berhasil', 'Penilaian Alternatif ' . $alternatif->nama . ' berhasil');
        return Redirect::route('indexPenilaian');
    }

    public function updatePenilaian(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'kriteria_id'   => 'required',
            'nilai'         => 'required'
        ]);

        Penilaian::where('alternatif_id', $alternatif->id)->delete();

        $i = 0;
        foreach ($request->nilai as $idSubkriteria) {
            $nilai = SubKriteria::where('id', $idSubkriteria)->value('nilai');
            Penilaian::create([
                'uuid'              => Str::uuid(),
                'user_id'           => Auth::user()->id,
                'alternatif_id'     => $alternatif->id,
                'kriteria_id'       => $request->kriteria_id[$i],
                'sub_kriteria_id'   => $idSubkriteria,
                'nilai'             => $nilai
            ]);
            $i++;
        }

        Alert::success('Berhasil', 'Penilaian Alternatif ' . $alternatif->nama . ' berhasil di update');
        return Redirect::route('indexPenilaian');
    }
}
