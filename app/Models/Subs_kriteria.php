<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subs_kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kriteria_id',
        'nama',
        'nilai',
    ];    

    
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
