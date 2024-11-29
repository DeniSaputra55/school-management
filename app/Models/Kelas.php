<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    //
    use HasFactory;
    protected $table = 'kelas';

    protected $fillable = ['nama'];

    // Relasi dengan siswa
    public function students()
    {
        return $this->hasMany(Siswa::class);
    }

    // Relasi dengan guru
    public function teachers()
    {
        return $this->hasMany(Guru::class);
    }
}
