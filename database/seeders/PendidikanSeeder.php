<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\DB;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "Tidak Bersekolah";
        $pendidikan->save();

        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "SD/Sederajat";
        $pendidikan->save();

        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "SMP/Sederajat";
        $pendidikan->save();

        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "SMA/Sederajat";
        $pendidikan->save();

        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "D1";
        $pendidikan->save();

        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "D2";
        $pendidikan->save();

        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "D3";
        $pendidikan->save();

        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "D4/S1";
        $pendidikan->save();

        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "S2";
        $pendidikan->save();

        $pendidikan = new Pendidikan();
        $pendidikan->nama_pendidikan = "S3";
        $pendidikan->save();
    }
}
