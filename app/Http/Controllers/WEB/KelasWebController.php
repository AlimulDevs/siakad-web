<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasWebController extends Controller
{
    public function create(Request $request)
    {

        Kelas::create([
            "nama" => $request->nama,

        ]);

        return redirect("/kelas/index")->with("success_add", "success create data");
    }
    public function update(Request $request)
    {


        Kelas::where("id", $request->id)->update([

            "nama" => $request->nama,

        ]);

        return redirect("/kelas/index")->with("success_edit", "success update data");
    }

    public function delete($id)
    {
        Kelas::where("id", $id)->delete();
        return redirect("/kelas/index")->with("success_delete", "success delete data");
    }
}
