<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        $user = User::where('username', $request->input('username'))->first();

        // Cek jika pengguna ditemukan
        if ($user) {
            // Jika password benar
            if (Hash::check($request->input('password'), $user->password)) {
                // Simpan id_user ke dalam session
                $request->session()->put('id_user', $user->id_user);
                $request->session()->put('id_role', $user->id_role);

                // Cek id_role dan arahkan pengguna
                if ($user->id_role == 1) {
                    return redirect()->route('owner.dashboard'); // Ubah dengan route yang sesuai
                } elseif ($user->id_role == 2) {
                    return redirect()->route('kasir.dashboard');  // Ubah dengan route yang sesuai
                } else {
                    return redirect()->back()->withErrors(['error' => 'Role tidak dikenali']);
                }
            } else {
                // Jika password salah
                return redirect()->back()->withInput($request->all())->withErrors(['error' => 'Password salah']);
            }
        } else {
            // Jika pengguna tidak ditemukan
            return redirect()->back()->withInput($request->all())->withErrors(['error' => 'Akun tidak ditemukan']);
        }
    }

    public function logout(Request $request)
    {
        // Hapus id_user dan id_role dari session
        $request->session()->forget('id_user');
        $request->session()->forget('id_role');

        // Mengarahkan pengguna ke halaman login setelah logout
        return redirect('/login');
    }
}
