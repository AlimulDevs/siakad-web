<?php

use App\Http\Controllers\WEB\AuthWebController;
use App\Http\Controllers\WEB\GuruWebController;
use App\Http\Controllers\WEB\JadwalWebController;
use App\Http\Controllers\WEB\JurusanWebController;
use App\Http\Controllers\WEB\KelasWebController;
use App\Http\Controllers\WEB\MataPelajaranWebController;
use App\Http\Controllers\WEB\NilaiAkhirWebController;
use App\Http\Controllers\WEB\SiswaWebController;
use App\Http\Controllers\WEB\ViewWebController;
use App\Http\Controllers\WEB\WaktuJadwalWebController;
use Illuminate\Support\Facades\Route;

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

Route::get('/loginIndex', [ViewWebController::class, 'loginIndex']);
Route::get('/registerIndex', [ViewWebController::class, 'registerIndex']);
Route::post('/register', [AuthWebController::class, 'register']);
Route::post('/login', [AuthWebController::class, 'login']);
Route::get('/logout', [AuthWebController::class, 'logout']);


Route::get('/', [ViewWebController::class, 'berandaView']);


// guru
Route::get('/guru/index', [ViewWebController::class, 'guruIndex']);
Route::post('/guru/create', [GuruWebController::class, 'create']);
Route::post('/guru/edit', [GuruWebController::class, 'update']);
Route::get('/guru/delete/{id}', [GuruWebController::class, 'delete']);
Route::get('/guru/create-index', [ViewWebController::class, 'guruCreateIndex']);
Route::get('/guru/edit-index/{id}', [ViewWebController::class, 'guruEditIndex']);

// siswa
Route::get('/siswa/index', [ViewWebController::class, 'siswaIndex']);
Route::post('/siswa/create', [SiswaWebController::class, 'create']);
Route::post('/siswa/edit', [SiswaWebController::class, 'update']);
Route::get('/siswa/delete/{id}', [SiswaWebController::class, 'delete']);
Route::get('/siswa/create-index', [ViewWebController::class, 'siswaCreateIndex']);
Route::get('/siswa/edit-index/{id}', [ViewWebController::class, 'siswaEditIndex']);
Route::get('/siswa/ujian-index/{siswa_id}', [ViewWebController::class, 'siswaUjianIndex']);
Route::get('/siswa/ujian/create-index/{id}', [ViewWebController::class, 'siswaUjianCreateIndex']);
Route::post('/siswa/ujian/create', [NilaiAkhirWebController::class, 'create']);

// jurusan
Route::get('/jurusan/index', [ViewWebController::class, 'jurusanIndex']);
Route::post('/jurusan/create', [JurusanWebController::class, 'create']);
Route::post('/jurusan/edit', [JurusanWebController::class, 'update']);
Route::get('/jurusan/delete/{id}', [JurusanWebController::class, 'delete']);
Route::get('/jurusan/create-index', [ViewWebController::class, 'jurusanCreateIndex']);
Route::get('/jurusan/edit-index/{id}', [ViewWebController::class, 'jurusanEditIndex']);
// kelas
Route::get('/kelas/index', [ViewWebController::class, 'kelasIndex']);
Route::get('/kelas/siswa-index/{kelas_id}', [ViewWebController::class, 'kelasSiswaIndex']);
Route::get('/kelas/siswa/create-index/{kelas_id}', [ViewWebController::class, 'kelasSiswaCreateIndex']);
Route::post('/kelas/create', [KelasWebController::class, 'create']);
Route::post('/kelas/edit', [KelasWebController::class, 'update']);
Route::get('/kelas/delete/{id}', [KelasWebController::class, 'delete']);
Route::get('/kelas/create-index', [ViewWebController::class, 'kelasCreateIndex']);
Route::get('/kelas/edit-index/{id}', [ViewWebController::class, 'kelasEditIndex']);
// mata-pelajaran
Route::get('/mata-pelajaran/index', [ViewWebController::class, 'mataPelajaranIndex']);
Route::post('/mata-pelajaran/create', [MataPelajaranWebController::class, 'create']);
Route::post('/mata-pelajaran/edit', [MataPelajaranWebController::class, 'update']);
Route::get('/mata-pelajaran/delete/{id}', [MataPelajaranWebController::class, 'delete']);
Route::get('/mata-pelajaran/create-index', [ViewWebController::class, 'mataPelajaranCreateIndex']);
Route::get('/mata-pelajaran/edit-index/{id}', [ViewWebController::class, 'mataPelajaranEditIndex']);
// jadwal
Route::get('/jadwal/index', [ViewWebController::class, 'jadwalIndex']);
Route::post('/jadwal/create', [JadwalWebController::class, 'create']);
Route::post('/jadwal/edit', [JadwalWebController::class, 'update']);
Route::get('/jadwal/delete/{id}', [JadwalWebController::class, 'delete']);
Route::get('/jadwal/create-index', [ViewWebController::class, 'jadwalCreateIndex']);
Route::get('/jadwal/edit-index/{id}', [ViewWebController::class, 'jadwalEditIndex']);


Route::get('/waktu-jadwal-index/{jadwal_id}', [ViewWebController::class, 'WaktuJadwalIndex']);
Route::get('/waktu-jadwal/create-index/{jadwal_id}', [ViewWebController::class, 'WaktuJadwalCreateIndex']);
Route::post('/waktu-jadwal/create', [WaktuJadwalWebController::class, 'create']);
Route::post('/waktu-jadwal/edit', [WaktuJadwalWebController::class, 'update']);
Route::get('/waktu-jadwal/delete/{id}', [WaktuJadwalWebController::class, 'delete']);
