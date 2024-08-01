<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\{User, Cabang, Kategori, Pelanggan};

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';

        // Mengambil jumlah user, cabang, kategori, dan pelanggan
        $data['userCount'] = User::count();
        $data['cabangCount'] = Cabang::count();
        $data['kategoriCount'] = Kategori::count();
        $data['pelangganCount'] = Pelanggan::count();

        return view('main.owner.dashboard', $data);
    }
}
