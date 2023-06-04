<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'alternatif_id',
        'kriteria_id',
        'nilai'
    ];

    public function Alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
