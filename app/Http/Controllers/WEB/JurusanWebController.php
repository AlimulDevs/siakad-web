<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanWebController extends Controller
{
    public function create(Request $request)
    {

        Jurusan::create([
            "name" => $request->name,

        ]);

        return redirect("/jurusan/index")->with("success_add", "success create data");
    }
    public function update(Request $request)
    {


        Jurusan::where("id", $request->id)->update([

            "name" => $request->name,

        ]);

        return redirect("/jurusan/index")->with("success_edit", "success update data");
    }

    public function delete($id)
    {
        Jurusan::where("id", $id)->delete();
        return redirect("/jurusan/index")->with("success_delete", "success delete data");
    }
}
