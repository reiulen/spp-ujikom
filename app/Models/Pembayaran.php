<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $guarded = ['id'];
    use HasFactory;

    public function spp(){
        return $this->belongsto(SPP::class);
    }

    public function petugas(){
        return $this->belongsto(Petugas::class);
    }
}
