<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SikapController;

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