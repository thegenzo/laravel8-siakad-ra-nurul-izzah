<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SikapController;
use App\Http\Controllers\RaporController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\HomepageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Halaman homepage
Route::get('/', [HomepageController::class, 'home']);
Route::view('/profil-tk', 'pages.homepage.profil-tk');
Route::view('/visi-misi', 'pages.homepage.visi-misi');
Route::view('/struktur-organisasi', 'pages.homepage.struktur-organisasi');
Route::get('/data-guru', [GuruController::class, 'dataGuru']);
Route::get('/data-guru/detail/{id}', [GuruController::class, 'detailGuru']);
Route::get('/data-kepsek/detail/{id}', [GuruController::class, 'detailKepsek']);
Route::get('/baca-artikel', [ArtikelController::class, 'homeArtikel']);
Route::get('/baca-artikel/baca/{id}', [ArtikelController::class, 'bacaArtikel'])->name('baca_artikel');

// Proses Login dan Logout
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Proses Registrasi Murid
Route::get('/register', [RegisterController::class, 'registrasiMurid']);
Route::post('/register', [RegisterController::class, 'enroll']);

// Edit Profil dan Akun
Route::get('/profil', [UserController::class, 'profile_show']);
Route::post('/profil', [UserController::class, 'post_profile']);
Route::post('/ubah-avatar', [UserController::class, 'ubah_avatar']);
Route::get('/akun', [UserController::class, 'user_setting']);
Route::post('/akun', [UserController::class, 'post_user']);

// Data Artikel
Route::resource('/artikel', ArtikelController::class);

Route::group(['middleware' => ['auth', 'ceklevel:admin,kepsek']], function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard']);

    Route::resource('admin', AdminController::class);
    
    Route::resource('guru', GuruController::class);
    Route::get('/guru/kelas/{id}', [GuruController::class, 'kelas'])->name('guru.kelas');
    
    Route::resource('murid', MuridController::class);
    Route::get('/murid/kelas/{id}', [MuridController::class, 'kelas'])->name('murid.kelas');
    
    Route::resource('mapel', MapelController::class);
    
    Route::resource('jadwal', JadwalController::class);
    Route::get('/jadwal/kelas/{id}', [JadwalController::class, 'kelas'])->name('jadwal.kelas');
    
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::post('/pengumuman', [PengumumanController::class, 'update'])->name('pengumuman.update');
   
    Route::resource('nilai', NilaiController::class);
    Route::get('/nilai/kelas/{id}', [NilaiController::class, 'kelas'])->name('nilai.kelas');
    Route::get('/nilai/murid/{id}', [NilaiController::class, 'murid'])->name('nilai.murid');
    
    Route::resource('sikap', SikapController::class);
    Route::get('/sikap/kelas/{id}', [SikapController::class, 'kelas'])->name('sikap.kelas');
    Route::get('/sikap/murid/{id}', [SikapController::class, 'murid'])->name('sikap.murid');
    
    Route::resource('ekskul', EkskulController::class);
    Route::get('/ekskul/kelas/{id}', [EkskulController::class, 'kelas'])->name('ekskul.kelas');
    Route::get('/ekskul/murid/{id}', [EkskulController::class, 'murid'])->name('ekskul.murid');
    
    Route::resource('rapor', RaporController::class);
    Route::get('/rapor/kelas/{id}', [RaporController::class, 'kelas'])->name('rapor.kelas');
    Route::get('/rapor/kelas/{idKelas}/murid/{id}', [RaporController::class, 'murid'])->name('rapor.murid');
    Route::put('/rapor/kelas/{idKelas}/murid/{id}', [RaporController::class, 'postRapor']);
    
    Route::get('/alumni', [MuridController::class, 'alumni']);
    Route::get('/alumni/{id}', [MuridController::class, 'alumni_rapor']);

    Route::get('pilih-kelas', [MuridController::class, 'pilih_kelas']);
    Route::put('update-kelas/{id}', [MuridController::class, 'update_kelas']);

});

Route::group(['middleware' => ['auth', 'ceklevel:admin,kepsek,guru']], function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    Route::resource('nilai', NilaiController::class);
    Route::get('/nilai/kelas/{id}', [NilaiController::class, 'kelas'])->name('nilai.kelas');
    Route::get('/nilai/murid/{id}', [NilaiController::class, 'murid'])->name('nilai.murid');
    Route::resource('sikap', SikapController::class);
    Route::get('/sikap/kelas/{id}', [SikapController::class, 'kelas'])->name('sikap.kelas');
    Route::get('/sikap/murid/{id}', [SikapController::class, 'murid'])->name('sikap.murid');
    Route::resource('rapor', RaporController::class);
    Route::get('/rapor/kelas/{id}', [RaporController::class, 'kelas'])->name('rapor.kelas');
    Route::get('/rapor/kelas/{idKelas}/murid/{id}', [RaporController::class, 'murid'])->name('rapor.murid');
    Route::put('/rapor/kelas/{idKelas}/murid/{id}', [RaporController::class, 'postRapor']);
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,kepsek,murid']], function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('/rapor-saya', [MuridController::class, 'rapor_saya']);
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,kepsek,guru,murid']], function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});