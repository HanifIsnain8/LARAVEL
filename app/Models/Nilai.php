<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'alternatif_id', 'kriteria_id', 'subs_kriteria_id', 'nilai'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function subsKriteria()
    {
        return $this->belongsTo(Subs_Kriteria::class);
    }
}
