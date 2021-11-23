<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepsek;
use App\Models\Artikel;
use App\Models\Murid;
use App\Models\Guru;

class HomepageController extends Controller
{
    public function home()
    {
        $kepsek = Kepsek::where('id', 1)->first();
        $artikel = Artikel::paginate(3);
        $guru = Guru::count();
        $murid = Murid::where('status_lulus', '0')->count();
        $alumni = Murid::where('status_lulus', '1')->count();

        return view('pages.homepage.home', compact('kepsek', 'artikel', 'guru', 'murid', 'alumni'));
    }
}
