<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sikap extends Model
{
    use HasFactory;

    protected $table = 'sikaps';

    protected $fillable = ['id_murid', 'id_kelas', 'id_guru', 'id_mapel', 'sikap1', 'sikap2', 'sikap3'];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_murid');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
}
