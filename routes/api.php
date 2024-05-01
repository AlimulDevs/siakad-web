<?php

use App\Http\Controllers\API\AbsenApiController;
use App\Http\Controllers\API\JadwalApiController;
use App\Http\Controllers\API\KelasApiController;
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




Route::POST('/jadwal', [JadwalApiController::class, "create"]);
Route::POST('/waktu-jadwal', [JadwalApiController::class, "createWaktu"]);
Route::DELETE('/jadwal/{id}', [JadwalApiController::class, "delete"]);

Route::GET('/kelas', [KelasApiController::class, "getAll"]);
Route::POST('/kelas', [KelasApiController::class, "create"]);
Route::DELETE('/kelas/{id}', [KelasApiController::class, "delete"]);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::GET('/profile', [UserApiController::class, "profile"]);
    Route::PUT('/profile', [UserApiController::class, "editProfile"]);
    Route::GET('/jadwal/get-by-kelas', [JadwalApiController::class, "getByKelas"]);
    Route::GET('/jadwal/get-by-guru', [JadwalApiController::class, "getByGuru"]);

    Route::GET('/absen/get-by-jadwal/{jadwal_id}', [AbsenApiController::class, "getByJadwal"]);
    Route::POST('/absen', [AbsenApiController::class, "create"]);
    Route::PUT('/siswa-absen/{absen_id}', [AbsenApiController::class, "siswaAbsen"]);
});
