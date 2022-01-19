<?php

namespace Database\Seeders;
use App\Models\Pekerjaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Tidak Bekerja";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Pensiunan";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "PNS";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "TNI/Polisi";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Guru/Dosen";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Pegawai Swasta";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Wiraswasta";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Pengacara/Jaksa/Hakim/Notaris";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Seniman/Pelukis/Artis/Sejenis";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Dokter/Bidan/Perawat";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Pilot/Pramugara";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Pedagang";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Petani/Peternak";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Nelayan";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Buruh (Tani/Pabrik/Bangunan)";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Sopir/Masinis/Kondektur";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Politikus";
        $kerja->save();

        $kerja = new Pekerjaan();
        $kerja->nama_pekerjaan = "Lainnya";
        $kerja->save();
    }
}
