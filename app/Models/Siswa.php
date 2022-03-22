<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Authenticatable
{
    protected $table = 'siswas';
    protected $guarded = ['id'];
    use HasFactory;

    public function spp()
    {
        return $this->belongsto(SPP::class);
    }

    public function kelas()
    {
        return $this->belongsto(Kelas::class);
    }
}
