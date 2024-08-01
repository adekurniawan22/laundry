<?php

namespace App\Http\Controllers\Owner;

use App\Models\Transaksi;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    // Constants for view titles
    private const TITLE_INDEX = 'Daftar Transaksi';

    // Index method
    public function index()
    {
        $transaksis = Transaksi::with('user', 'pelanggan', 'cabang')->get();
        return view('main.owner.transaksi.index', [
            'transaksis' => $transaksis,
            'title' => self::TITLE_INDEX
        ]);
    }
}
