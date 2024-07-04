<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruWebController extends Controller
{
    public function create(Request $request)
    {
        $user_guru = User::create([
            'role' => "guru",
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Guru::create([
            "user_id" => $user_guru->id,
            "nip" => $request->nip,

        ]);

        return redirect("/guru/index")->with("success_add", "success create data");
    }
    public function update(Request $request)
    {
        $user_guru = User::where("id", $request->user_id)->update([

            'name' => $request->name,
            'email' => $request->email,

        ]);

        Guru::where("id", $request->id)->update([

            "nip" => $request->nip,

        ]);

        return redirect("/guru/index")->with("success_edit", "success update data");
    }

    public function delete($id)
    {
        User::where("id", $id)->delete();
        return redirect("/guru/index")->with("success_delete", "success delete data");
    }
}
