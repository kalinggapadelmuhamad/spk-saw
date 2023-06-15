<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;
use App\Exports\HasilsExport;
use Maatwebsite\Excel\Facades\Excel;

class HasilController extends Controller
{
    public function indexHasil()
    {
        $page = 'hasil';
        $hasils = Hasil::orderBy('nilai', 'DESC')->get();
        return view('hasil.indexHasil', compact(
            'page',
            'hasils'
        ));
    }

    public function exportHasil()
    {
        return Excel::download(new HasilsExport, 'Hasil Perhitungan ' . date('Y-M-D') . '.xlsx');
    }
}
