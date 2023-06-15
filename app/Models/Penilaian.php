<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'alternatif_id',
        'kriteria_id',
        'sub_kriteria_id',
        'nilai'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function SubKriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }
}
