<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanApiController extends Controller
{
    public function getAll()
    {
        $data_jurusan = Jurusan::get();

        return response()->json([
            "message" => "Success Get All",
            "data" => $data_jurusan
        ]);
    }

    public function create(Request $request)
    {
        $data_jurusan = Jurusan::create([
            "name" => $request->name
        ]);

        return response()->json([
            "message" => "Success Create Data",
            "data" => $data_jurusan
        ]);
    }
    public function delete($id)
    {
        Jurusan::where("id", $id)->delete();

        return response()->json([
            "message" => "Success Delete Data",

        ]);
    }
}
