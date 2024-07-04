<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaWebController extends Controller
{
    public function create(Request $request)
    {
        $user_siswa = User::create([
            'role' => "siswa",
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Siswa::create([
            "user_id" => $user_siswa->id,
            "jurusan_id" => $request->jurusan_id,
            "kelas_id" => $request->kelas_id,
        ]);

        return redirect()->back()->with("success_add", "success create data");
    }
    public function update(Request $request)
    {
        $user_siswa = User::where("id", $request->user_id)->update([

            'name' => $request->name,
            'email' => $request->email,

        ]);

        Siswa::where("id", $request->id)->update([


            "jurusan_id" => $request->jurusan_id,
            "kelas_id" => $request->kelas_id,

        ]);

        return redirect()->back()->with("success_edit", "success update data");
    }

    public function delete($id)
    {
        User::where("id", $id)->delete();
        return redirect("/siswa/index")->with("success_delete", "success delete data");
    }
}
