<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\WaktuJadwal;
use Illuminate\Http\Request;

class WaktuJadwalWebController extends Controller
{

    public function create(Request $request)
    {

        WaktuJadwal::create([
            'jadwal_id' => $request->jadwal_id,
            'hari' => $request->hari,
            'jam_awal' => $request->jam_awal,
            'jam_akhir' => $request->jam_akhir,
        ]);
        $url = "/waktu-jadwal-index/" . $request->jadwal_id;
        return redirect($url)->with("success_add", "success create data");
    }
    public function update(Request $request)
    {


        WaktuJadwal::where("id", $request->id)->update([
            'jadwal_id' => $request->jadwal_id,
            'hari' => $request->hari,
            'jam_awal' => $request->jam_awal,
            'jam_akhir' => $request->jam_akhir,
        ]);

        return redirect("/waktu-jadwal/index")->with("success_edit", "success update data");
    }

    public function delete($id)
    {
        $waktu_jadwal = WaktuJadwal::where("id", $id)->first();
        $url = "/waktu-jadwal-index/" . $waktu_jadwal->jadwal_id;
        $waktu_jadwal->delete();
        return redirect($url)->with("success_delete", "success delete data");
    }
}
