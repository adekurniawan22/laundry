<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = DB::table('user')
            ->join('role', 'user.id_role', '=', 'role.id_role') // Menggabungkan tabel user dan role
            ->select('user.*', 'role.nama_role') // Memilih kolom dari tabel user dan role
            ->get();

        $data['title'] = 'User';
        return view('main.owner.user.index', $data);
    }
}
