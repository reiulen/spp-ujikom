<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function datasiswa($id)
    {
        $siswa = Siswa::with('spp')->findOrFail($id);
        return response()->json([
            'nominal' => $siswa->spp->nominal,
        ]);
    }
}
