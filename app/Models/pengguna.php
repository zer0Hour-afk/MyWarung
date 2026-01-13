<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pengguna';
    public $timestamps = false;

    protected $fillable = [
        'nama_pengguna',
        'kata_sandi',
        'nama_lengkap',
        'peran',
        'telepon',
        'email',
        'status_aktif',
        'foto_profil',
    ];

    protected $hidden = [
        'kata_sandi',
    ];

    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}