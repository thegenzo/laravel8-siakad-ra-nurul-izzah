<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = ['id_user', 'jk', 'nip', 'alamat', 'no_hp', 'id_kelas'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_guru');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_guru');
    }

    public function sikap()
    {
        return $this->hasMany(Sikap::class, 'id_guru');
    }   

    public function ekskul()
    {
        return $this->hasMany(Ekskul::class, 'id_murid');
    }
}
