<?php

namespace App\Exports;

use App\Models\Hasil;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class HasilsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        return Hasil::orderBy('nilai', 'desc')->get();
    }

    public function headings(): array
    {
        return ['NRP', 'Nama', 'Nilai', 'Rank'];
    }

    public function map($hasil): array
    {
        static $rank = 0;

        return [
            $hasil->Alternatif->nrp,
            $hasil->Alternatif->nama,
            $hasil->nilai,
            ++$rank,
        ];
    }
}
