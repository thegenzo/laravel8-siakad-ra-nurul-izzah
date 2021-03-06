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
        $jadwal = Jadwal::OrderBy('id_kelas')->OrderBy('jam_mulai')->OrderBy('jam_selesai')->where('id_hari', $hari)->get();

        return view('pages.dashboard', compact('pengumuman', 'jadwal'));

    }

    public function adminDashboard()
    {
        $admin = Admin::count();
        $guru = Guru::count();
        $murid = Murid::where('status_lulus', '0')->count();
        $alumni = Murid::where('status_lulus', '1')->count();
        
        $muridL = Murid::where('jk', 'L')->where('status_lulus', '0')->count();
        $muridP = Murid::where('jk', 'P')->where('status_lulus', '0')->count();

        $kelasA = Murid::where('id_kelas', 1)->where('status_lulus', '0')->count();
        $kelasB1 = Murid::where('id_kelas', 2)->where('status_lulus', '0')->count();
        $kelasB2 = Murid::where('id_kelas', 3)->where('status_lulus', '0')->count();

        return view('pages.admin-dashboard', compact('admin', 'guru', 'murid', 'alumni', 'muridL', 'muridP', 'kelasA', 'kelasB1', 'kelasB2'));

    }
}
