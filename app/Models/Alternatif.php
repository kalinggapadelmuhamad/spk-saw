<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nrp',
        'nama'
    ];

    public function Penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function Hasil()
    {
        return $this->hasMany(Hasil::class);
    }
}
