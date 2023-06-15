<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function indexPerhitungan()
    {
        $kriterias      = [];
        $total_b        = Kriteria::sum('bobot');
        $kriteriaRows   = Kriteria::orderBy('kode_kriteria', 'ASC')->get();

        foreach ($kriteriaRows as $krit) {

            $kriterias[$krit->id]['id'] = $krit->id;
            $kriterias[$krit->id]['kode_kriteria'] = $krit->kode_kriteria;
            $kriterias[$krit->id]['nama'] = $krit->nama;
            $kriterias[$krit->id]['type'] = $krit->type;
            $kriterias[$krit->id]['bobot'] = $krit->bobot;
            $kriterias[$krit->id]['normalisasi'] = $krit->bobot / $total_b;
        }

        $altRows        = Alternatif::all();
        $alternatifs    = [];

        foreach ($altRows as $alt) {
            $alternatifs[$alt->id]['id'] = $alt->id;
            $alternatifs[$alt->id]['nama'] = $alt->nama;
        }

        $matriks_x = [];

        foreach ($kriterias as $kriteria) {
            foreach ($alternatifs as $alternatif) {

                $id_alternatif  = $alternatif['id'];
                $id_kriteria    = $kriteria['id'];

                $nilai = Penilaian::where('alternatif_id', $alternatif['id'])
                    ->where('kriteria_id', $kriteria['id'])
                    ->value('nilai');

                $matriks_x[$id_kriteria][$id_alternatif] = $nilai;
            }
        }


        // dd($kriterias);

        $page = 'perhitungan';
        return view('perhitungan.indexPerhitungan', compact(
            'page',
            'kriterias',
            'alternatifs',
            'matriks_x'
        ));
    }
}
