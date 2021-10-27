<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Murid;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pengumuman = Pengumuman::where('id', 1)->first();
        $hari = date('w');
        $jam = date('H:i');
        $jadwal = Jadwal::OrderBy('jam_mulai')->OrderBy('jam_selesai')->OrderBy('id_kelas')->where('id_hari', $hari)->get();

        return view('pages.dashboard', compact('pengumuman', 'jadwal'));

    }

    public function adminDashboard()
    {
        $admin = Admin::count();
        $guru = Guru::count();
        $murid = Murid::count();
        
        $muridL = Murid::where('jk', 'L')->count();
        $muridP = Murid::where('jk', 'P')->count();

        $kelasA = Murid::where('id_kelas', 1)->count();
        $kelasB1 = Murid::where('id_kelas', 2)->count();
        $kelasB2 = Murid::where('id_kelas', 3)->count();

        return view('pages.admin-dashboard', compact('admin', 'guru', 'murid', 'muridL', 'muridP', 'kelasA', 'kelasB1', 'kelasB2'));

    }
}
