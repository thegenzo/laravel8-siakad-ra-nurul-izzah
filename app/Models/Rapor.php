<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;

    protected $table = 'rapors';
    
    protected $fillable = ['id_murid', 'id_kelas', 'nem', 'predikat', 'deskripsi', 'status'];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_murid');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    
}
