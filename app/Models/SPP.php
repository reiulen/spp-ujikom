<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    protected $table = 'spps';
    protected $guarded = ['id'];

    use HasFactory;
}
