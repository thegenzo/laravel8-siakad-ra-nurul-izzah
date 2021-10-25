<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $table = 'murids';

    protected $fillable = ['id_user', 'jk', 'tempat_lahir', 'tanggal_lahir', 'id_kelas', 'nama_ortu', 'pekerjaan_ortu', 'alamat', 'np_hp'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_murid');
    }

    public function sikap()
    {
        return $this->hasMany(Sikap::class, 'id_murid');
    }

    public function rapor()
    {
        return $this->hasMany(Rapor::class, 'id_murid');
    }

    public function ekskul()
    {
        return $this->hasMany(Ekskul::class, 'id_murid');
    }
}
