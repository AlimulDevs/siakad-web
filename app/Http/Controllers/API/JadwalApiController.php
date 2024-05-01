<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\WaktuJadwal;
use Illuminate\Http\Request;

class JadwalApiController extends Controller
{
    public function getByKelas()
    {
        $data_siswa = Siswa::where("user_id", auth()->user()->id)->first();

        $data_jadwal = Jadwal::where("kelas_id", $data_siswa->kelas_id)->with("absen")->with("waktu_jadwal")->with("guru.user")->get();
        return response()->json([
            "message" => "Success Get By Kelas",
            "data" => $data_jadwal
        ]);
    }
    public function getByGuru()
    {
        $data_guru = Guru::where("user_id", auth()->user()->id)->first();
        $data_jadwal = Jadwal::where("guru_id", $data_guru->id)->with("absen")->with("kelas")->with("guru.user")->get();
        return response()->json([
            "message" => "Success Get By Guru",
            "data" => $data_jadwal
        ]);
    }
    public function create(Request $request)
    {
        $data_jadwal = Jadwal::with("guru")->with("kelas")->create([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran' => $request->mata_pelajaran,
        ]);
        return response()->json([
            "message" => "Success Get By Guru",
            "data" => $data_jadwal
        ]);
    }
    public function createWaktu(Request $request)
    {
        $data_waktu_jadwal =        WaktuJadwal::with("guru")->with("kelas")->create([
            'jadwal_id' => $request->jadwal_id,
            'hari' => $request->hari,
            'jam_awal' => $request->jam_awal,
            'jam_akhir' => $request->jam_akhir,
        ]);
        return response()->json([
            "message" => "Success Get By Guru",
            "data" => $data_waktu_jadwal
        ]);
    }

    public function delete($id)
    {
        Jadwal::where("id", $id)->delete();

        return response()->json([
            "message" => "Success Delete Data",

        ]);
    }
}
