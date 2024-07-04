<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaAbsen;
use Illuminate\Http\Request;

class AbsenApiController extends Controller
{
    public function create(Request $request)
    {
        $data_absen =  Absen::create([
            'jadwal_id' => $request->jadwal_id,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
        ]);

        $get_jadwal = Jadwal::where("id", $request->jadwal_id)->first();
        $get_kelas = Kelas::where("id", $get_jadwal->kelas_id)->with("siswa")->first();
        foreach ($get_kelas->siswa as $siswa) {
            SiswaAbsen::create([
                'siswa_id' => $siswa->id,
                'absen_id' => $data_absen->id,
                'is_absen' => false,
            ]);
        }


        return response()->json([
            "message" => "Success Create Absen",
            "data" => $data_absen
        ]);
    }

    public function getByJadwal($jadwal_id)
    {
        $absen = Absen::where("jadwal_id", $jadwal_id)->with("siswa_absen.siswa.user")->get();
        return response()->json([
            "message" => "Success Get By Jadwal",
            "data" => $absen
        ]);
    }
    public function siswaAbsen($absen_id)
    {
        $data_siswa = Siswa::where("user_id", auth()->user()->id)->first();
        SiswaAbsen::where("absen_id", $absen_id)->where("siswa_id", $data_siswa->id)->update([
            'is_absen' => true,
        ]);
        return response()->json([
            "message" => "Success Absensi",

        ]);
    }
}
