<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $data['title'] = 'Auth';
        return view('login', $data);
    }

    public function authenticationLogin(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // Ambil data pengguna berdasarkan username
        $user = DB::table('user')->where('username', $request->input('username'))->first();

        // Jika pengguna ditemukan
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Simpan id_user ke dalam session
            $request->session()->put('id_user', $user->id_user);

            // Cek id_role dan arahkan pengguna
            if ($user->id_role == 1) {
                return redirect()->route('owner.dashboard'); // Ubah dengan route yang sesuai
            } elseif ($user->id_role == 2) {
                return redirect()->route('kasir.dashboard'); // Ubah dengan route yang sesuai
            } else {
                return redirect()->back()->withErrors(['error' => 'Role tidak dikenali']);
            }
        } else {
            // Jika pengguna tidak ditemukan atau password salah
            return redirect()->back()->withInput($request->all())->withErrors(['error' => 'Username atau password salah']);
        }
    }
}
