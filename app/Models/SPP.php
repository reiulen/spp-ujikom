<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    protected $table = 'spp';
    protected $guarded = ['id'];

    use HasFactory;
}
