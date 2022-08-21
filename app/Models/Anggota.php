<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggotas';
    protected $fillable = [
        'nama',
        'nim',
        'prodi',
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function kas()
    {
        return $this->hasMany(Kas::class);
    }
}
