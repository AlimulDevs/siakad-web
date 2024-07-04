<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalWebController extends Controller
{
    public function create(Request $request)
    {

        Jadwal::create([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
        ]);

        return redirect("/jadwal/index")->with("success_add", "success create data");
    }
    public function update(Request $request)
    {


        Jadwal::where("id", $request->id)->update([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
        ]);

        return redirect("/jadwal/index")->with("success_edit", "success update data");
    }

    public function delete($id)
    {
        Jadwal::where("id", $id)->delete();
        return redirect("/jadwal/index")->with("success_delete", "success delete data");
    }
}
