<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\NilaiAkhir;
use Illuminate\Http\Request;

class NilaiAkhirWebController extends Controller
{
    public function create(Request $request)
    {

        NilaiAkhir::create([
            'siswa_id' => $request->siswa_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'nilai_akhir' => $request->nilai_akhir,

        ]);
        $url = "/siswa/ujian-index/" . $request->siswa_id;
        return redirect($url)->with("success_add", "success create data");
    }
    public function update(Request $request)
    {


        NilaiAkhir::where("id", $request->id)->update([
            'siswa_id' => $request->siswa_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'nilai_akhir' => $request->nilai_akhir,
        ]);
        $url = "/siswa/ujian-index/" . $request->siswa_id;
        return redirect($url)->with("success_edit", "success update data");
    }

    public function delete($id)
    {
        $data_nilai_akhir = NilaiAkhir::where("id", $id)->first();
        $url = "/siswa/ujian-index/" . $data_nilai_akhir->siswa_id;


        $data_nilai_akhir->delete();
        return redirect($url)->with("success_delete", "success delete data");
    }
}
