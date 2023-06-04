<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'kode_kriteria',
        'nama',
        'type',
        'bobot',
        'ada_pilihan',
    ];

    public function SubKriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }

    public function Penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
