<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hari;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hari = new Hari();
        $hari->nama_hari = "Senin";
        $hari->save();

        $hari = new Hari();
        $hari->nama_hari = "Selasa";
        $hari->save();

        $hari = new Hari();
        $hari->nama_hari = "Rabu";
        $hari->save();

        $hari = new Hari();
        $hari->nama_hari = "Kamis";
        $hari->save();

        $hari = new Hari();
        $hari->nama_hari = "Jum'at";
        $hari->save();

        $hari = new Hari();
        $hari->nama_hari = "Sabtu";
        $hari->save();
    }
}
