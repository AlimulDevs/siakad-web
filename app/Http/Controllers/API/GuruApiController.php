<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruApiController extends Controller
{
    public function getAll()
    {
        $data_guru = Guru::get();

        return response()->json([
            "message" => "Success Get All",
            "data" => $data_guru
        ]);
    }
}
