<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'gender',
        'alamat',
        'no_hp',
        'email',
        'semester',
        'jurusan',
        'asal_kampus',
    ];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

}
