<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'level',
        'avatar',
        'email',
        'password',
        'konfirmasi_password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function guru()
    {
        return $this->hasOne(Guru::class, 'id_user');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_user');
    }

    public function kepsek()
    {
        return $this->hasOne(Kepsek::class, 'id_user');
    }

    public function murid()
    {
        return $this->hasOne(Murid::class, 'id_user');
    }
}
