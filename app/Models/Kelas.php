<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = ['nama_kelas'];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'id_kelas');
    }

    public function murid()
    {
        return $this->hasMany(Murid::class, 'id_kelas');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_kelas');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_kelas');
    }

    public function sikap()
    {
        return $this->hasMany(Sikap::class, 'id_kelas');
    }

    public function rapor()
    {
        return $this->hasMany(Rapor::class, 'id_kelas');
    }

    public function ekskul()
    {
        return $this->hasMany(Ekskul::class, 'id_murid');
    }
}
