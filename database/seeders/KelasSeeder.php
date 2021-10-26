<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = new Kelas();
        $kelas->nama_kelas = 'A';
        $kelas->save();

        $kelas = new Kelas();
        $kelas->nama_kelas = 'B1';
        $kelas->save();

        $kelas = new Kelas();
        $kelas->nama_kelas = 'B2';
        $kelas->save();
    }
}
