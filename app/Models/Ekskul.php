<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $table = 'ekskuls';

    protected $fillable = ['id_murid', 'id_guru', 'id_kelas', 'kegiatan_ekskul', 'hasil'];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_murid');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
