<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login()
    {
        $p = DB::table('user')->where('username', $_POST['username'])->first();
        if ($p) {
            dd('m');
        } else {
            dd('d');
        }
    }
}
