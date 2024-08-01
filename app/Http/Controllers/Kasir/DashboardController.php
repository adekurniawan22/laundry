<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pelangganCount'] = Pelanggan::count();

        return view('main.kasir.dashboard', $data);
    }
}
