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

    public function getDetail($id_transaksi)
    {
        // Ambil data transaksi bersama dengan relasi terkait
        $transaksi = Transaksi::with(['user', 'pelanggan', 'detailTransaksi.kategori', 'cabang'])
            ->find($id_transaksi);

        // Cek jika transaksi tidak ditemukan
        if (!$transaksi) {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        // Jika transaksi ditemukan, kembalikan data sebagai JSON
        return response()->json([
            'id_transaksi' => $transaksi->id_transaksi,
            'user' => $transaksi->user,
            'pelanggan' => $transaksi->pelanggan,
            'cabang' => $transaksi->cabang,
            'tgl_transaksi' => $transaksi->tgl_transaksi,
            'tgl_selesai' => $transaksi->tgl_selesai,
            'status' => $transaksi->status,
            'details' => $transaksi->detailTransaksi->map(function ($detail) {
                return [
                    'kategori' => $detail->kategori->kategori, // Asumsi 'nama' adalah field di model Kategori
                    'harga' => $detail->kategori->harga,
                    'jumlah' => $detail->jumlah,
                ];
            }),
        ]);
    }
}
