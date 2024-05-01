<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasApiController extends Controller
{
    public function getAll()
    {
        $data_kelas = Kelas::get();

        return response()->json([
            "message" => "Success Get All",
            "data" => $data_kelas
        ]);
    }

    public function create(Request $request)
    {
        $data_kelas = Kelas::create([
            "nama" => $request->nama
        ]);

        return response()->json([
            "message" => "Success Create Data",
            "data" => $data_kelas
        ]);
    }
    public function delete($id)
    {
        Kelas::where("id", $id)->delete();

        return response()->json([
            "message" => "Success Delete Data",

        ]);
    }
}
