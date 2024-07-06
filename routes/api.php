<?php

use App\Http\Controllers\API\AbsenApiController;
use App\Http\Controllers\API\GuruApiController;
use App\Http\Controllers\API\JadwalApiController;
use App\Http\Controllers\API\JurusanApiController;
use App\Http\Controllers\API\KelasApiController;
use App\Http\Controllers\API\MataPelajaranApiController;
use App\Http\Controllers\API\NilaiAkhirApiController;
use App\Http\Controllers\API\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::POST('/register-siswa', [UserApiController::class, "registerSiswa"]);
Route::POST('/register-guru', [UserApiController::class, "registerGuru"]);
Route::POST('/login', [UserApiController::class, "login"]);



Route::GET('/jadwal', [JadwalApiController::class, "getAll"]);
Route::POST('/jadwal', [JadwalApiController::class, "create"]);
Route::POST('/waktu-jadwal', [JadwalApiController::class, "createWaktu"]);
Route::DELETE('/jadwal/{id}', [JadwalApiController::class, "delete"]);

// guru
Route::GET('/guru', [GuruApiController::class, "getAll"]);
// kelas
Route::GET('/kelas', [KelasApiController::class, "getAll"]);
Route::POST('/kelas', [KelasApiController::class, "create"]);
Route::DELETE('/kelas/{id}', [KelasApiController::class, "delete"]);

// jurusan
Route::GET('/jurusan', [JurusanApiController::class, "getAll"]);
Route::POST('/jurusan', [JurusanApiController::class, "create"]);
Route::DELETE('/jurusan/{id}', [JurusanApiController::class, "delete"]);

// mata-pelajaran
Route::GET('/mata-pelajaran', [MataPelajaranApiController::class, "getAll"]);
Route::POST('/mata-pelajaran', [MataPelajaranApiController::class, "create"]);
Route::DELETE('/mata-pelajaran/{id}', [MataPelajaranApiController::class, "delete"]);




Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::GET('/profile', [UserApiController::class, "profile"]);
    Route::PUT('/profile', [UserApiController::class, "editProfile"]);
    Route::POST('/photo-profile', [UserApiController::class, "editPhotoProfile"]);
    Route::GET('/jadwal/get-by-kelas', [JadwalApiController::class, "getByKelas"]);
    Route::GET('/waktu-jadwal/get-by-kelas', [JadwalApiController::class, "getWaktuJadwalByKelas"]);
    Route::GET('/jadwal/get-by-guru', [JadwalApiController::class, "getByGuru"]);



    Route::GET('/absen/get-by-jadwal/{jadwal_id}', [AbsenApiController::class, "getByJadwal"]);
    Route::POST('/absen', [AbsenApiController::class, "create"]);
    Route::PUT('/siswa-absen/{absen_id}', [AbsenApiController::class, "siswaAbsen"]);


    Route::GET('/siswa/nilai-akhir', [NilaiAkhirApiController::class, "getBySiswa"]);
});
