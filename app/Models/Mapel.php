<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels';

    protected $fillable = ['nama_mapel'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_mapel');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mapel');
    }

    public function sikap()
    {
        return $this->hasMany(Sikap::class, 'id_mapel');
    }

}
