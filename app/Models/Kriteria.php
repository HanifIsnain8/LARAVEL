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
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subsKriteria()
    {
        return $this->hasMany(Subs_kriteria::class, 'kriteria_id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
