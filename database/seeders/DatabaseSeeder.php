<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Petugas::create([
            'id_petugas' => 'PE001',
            'username' => 'Admin',
            'password' => bcrypt('admin'),
            'nama_petugas' => 'Reihan Andika AM',
            'level' => 'Admin'
        ]);
    }
}
