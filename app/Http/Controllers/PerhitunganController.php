<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function indexPerhitungan()
    {
        Hasil::truncate();

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

        $altRows        = Alternatif::latest()->get();
        $alternatifs    = [];

        foreach ($altRows as $alt) {
            $alternatifs[$alt->id]['id'] = $alt->id;
            $alternatifs[$alt->id]['nama'] = $alt->nama;
        }

        // Matrikx Keputusan X
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

        $nilai_u = [];
        foreach ($kriterias as $kriteria) {
            foreach ($alternatifs as $alternatif) {

                $id_alternatif  = $alternatif['id'];
                $id_kriteria    = $kriteria['id'];
                $nilai          = $matriks_x[$id_kriteria][$id_alternatif];
                $type_kriteria  = $kriteria['type'];

                $nilai_max = max($matriks_x[$id_kriteria]);
                $nilai_min = min($matriks_x[$id_kriteria]);

                if ($type_kriteria == 'Benefit') {
                    $u = ($nilai - $nilai_min) / ($nilai_max - $nilai_min);
                } elseif ($type_kriteria == 'Cost') {
                    $u = ($nilai_max - $nilai) / ($nilai_max - $nilai_min);
                } else {
                    $u = null;
                }

                $nilai_u[$id_kriteria][$id_alternatif] = $u;
            }
        }

        //Nilai Utility (U)
        $nilai_ub = [];
        foreach ($kriterias as $kriteria) {
            foreach ($alternatifs as $alternatif) {

                $id_alternatif  = $alternatif['id'];
                $id_kriteria    = $kriteria['id'];
                $u              = $nilai_u[$id_kriteria][$id_alternatif];
                $normalisasi    = $kriteria['normalisasi'];

                $nilai_ub[$id_kriteria][$id_alternatif] = $u * $normalisasi;
            }
        }

        //Perhitungan Nilai
        $perhitungan = [];
        foreach ($alternatifs as $alternatif) {
            $nilai_total = 0;
            foreach ($kriterias as $kriteria) {
                $normalisasi    = $kriteria['normalisasi'];
                $id_alternatif  = $alternatif['id'];
                $id_kriteria    = $kriteria['id'];

                $u = $nilai_u[$id_kriteria][$id_alternatif];
                $nilai_total += $normalisasi * $u;
            }
            $perhitungan[$alternatif['id']]['id']       = $alternatif['id'];
            $perhitungan[$alternatif['id']]['nama']     = $alternatif['nama'];
            $perhitungan[$alternatif['id']]['nilai']    = $nilai_total;
        }



        // dd($kriterias);

        $page = 'perhitungan';
        return view('perhitungan.indexPerhitungan', compact(
            'page',
            'kriterias',
            'alternatifs',
            'matriks_x',
            'nilai_u',
            'nilai_ub',
            'perhitungan'
        ));
    }
}
