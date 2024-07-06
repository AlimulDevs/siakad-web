<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\NilaiAkhir;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiAkhirApiController extends Controller
{
    public function getBySiswa()
    {
        $data_siswa = Siswa::where("user_id", auth()->user()->id)->first();

        $nilai_akhir = NilaiAkhir::where("siswa_id", $data_siswa->id)->get();
        return response()->json([
            'isSuccess' => true,
            'message' => 'Success Get Nilai Akhir',
            'data' => $nilai_akhir
        ]);
    }
}
