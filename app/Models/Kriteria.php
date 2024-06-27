<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kode',
        'nama',
        'bobot',
        'tipe_kriteria',
    ];

    public function subsKriterias()
    {
        return $this->hasMany(Subs_kriteria::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
