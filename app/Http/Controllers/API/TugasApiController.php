<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasApiController extends Controller
{
    public function create(Request $request)
    {
        $data_tugas =  Tugas::create([
            'jadwal_id' => $request->jadwal_id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);




        return response()->json([
            "message" => "Success Create Tugas",
            "data" => $data_tugas
        ]);
    }

    public function getByJadwal($jadwal_id)
    {
        $tugas = Tugas::where("jadwal_id", $jadwal_id)->get();
        return response()->json([
            "message" => "Success Get By Jadwal",
            "data" => $tugas
        ]);
    }

    public function delete($id)
    {
        Tugas::where("id", $id)->delete();

        return response()->json([
            "message" => "Success Delete Tugas",
        ]);
    }
}
