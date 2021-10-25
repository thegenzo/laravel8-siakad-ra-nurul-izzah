<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepsek extends Model
{
    use HasFactory;

    protected $table = 'kepseks';

    protected $fillable = ['id_user', 'jk', 'nip', 'alamat', 'no_hp'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
