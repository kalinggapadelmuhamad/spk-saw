<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'kriteria_id',
        'nama',
        'nilai'
    ];

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function Penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
