<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    public function registerGuru(Request $request)
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



        return response()->json(["message" => "Success Create Account Guru",]);
    }
    public function registerSiswa(Request $request)
    {
        $user = User::create([
            'role' => "siswa",
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Siswa::create([
            "user_id" => $user->id,
            "kelas_id" => $request->kelas_id,
            "jurusan" => $request->jurusan,
        ]);

        $data = $user->with("siswa")->first();

        return response()->json(["message" => "Success Create Account", "data" => $data]);
    }


    public function profile()
    {
        try {

            $user = User::where("id", auth()->user()->id)->with("guru")->with("siswa.kelas")->first();
            return [
                'isSuccess' => true,
                'message' => 'Success Get Profile',
                'data' => $user
            ];
        } catch (\Throwable $th) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'Failed Register',
                'error' => $th
            ], 500);
        }
    }
    public function editProfile(Request $request)
    {
        $user = User::where("id",  auth()->user()->id)->update([
            "email" => $request->email,
            "name" => $request->name,

        ]);

        if (auth()->user()->role == "siswa") {
            Siswa::where("user_id", auth()->user()->id)->update([
                'jurusan' => $request->jurusan,
                'kelas_id' => $request->kelas_id,
            ]);
        } else if (auth()->user()->role == "guru") {
            Guru::where("user_id", auth()->user()->id)->update([
                'nip' => $request->nip,

            ]);
        }



        return response()->json([
            'isSuccess' => true,
            "message" => "Success Update Profile",
        ]);
    }



    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->with("siswa")->first();

        if ($user == null) {
            return response()->json(["message" => "Failed Login, Email Not Found"]);
        }

        if (Hash::check($request->password, $user->password)) {
            $getUser = User::where('email', $request['email'])->firstOrFail();
            $token = $getUser->createToken('auth_token')->plainTextToken;

            User::where("id", $getUser->id)->update([
                "remember_token" => $token
            ]);
            return response()->json([
                "message" => "Success Login Account",
                "token" => $token,
                "data" => $user
            ]);
        } else {
            return response()->json(["message" => "Failed Login, Wrong Password"]);
        }
    }
}
