<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranWebController extends Controller
{
    public function create(Request $request)
    {

        MataPelajaran::create([
            "mata_pelajaran" => $request->mata_pelajaran,
            "jurusan_id" => $request->jurusan_id,

        ]);

        return redirect("/mata-pelajaran/index")->with("success_add", "success create data");
    }
    public function update(Request $request)
    {


        MataPelajaran::where("id", $request->id)->update([

            "mata_pelajaran" => $request->mata_pelajaran,
            "jurusan_id" => $request->jurusan_id,

        ]);

        return redirect("/mata-pelajaran/index")->with("success_edit", "success update data");
    }

    public function delete($id)
    {
        MataPelajaran::where("id", $id)->delete();
        return redirect("/mata-pelajaran/index")->with("success_delete", "success delete data");
    }
}
