<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranApiController extends Controller
{

    public function getAll()
    {
        $data_mata_pelajaran = MataPelajaran::get();

        return response()->json([
            "message" => "Success Get All",
            "data" => $data_mata_pelajaran
        ]);
    }


    public function create(Request $request)
    {
        $data_mata_pelajaran = MataPelajaran::create([
            "mata_pelajaran" => $request->mata_pelajaran
        ]);

        return response()->json([
            "message" => "Success Create Data",
            "data" => $data_mata_pelajaran
        ]);
    }
    public function delete($id)
    {
        MataPelajaran::where("id", $id)->delete();

        return response()->json([
            "message" => "Success Delete Data",

        ]);
    }
}
