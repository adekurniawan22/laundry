<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Kategori; // Tambahkan import model Kategori
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pelangganCount'] = Pelanggan::count();
        $data['transaksiCount'] = Transaksi::count();

        // Mendapatkan tanggal awal dan akhir bulan ini
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

        // Ambil data cabang berdasarkan id_user di session
        $user = User::with('cabang')->find(session('id_user'));
        $id_cabang = $user->cabang->id_cabang;

        // Mendapatkan id_transaksi dengan status 'Lunas' dari bulan ini
        $idTransaksiBulanIniLunas = Transaksi::where('status', 'Lunas')
            ->where('id_cabang', $id_cabang)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->pluck('id_transaksi');

        // Mendapatkan id_kategori dan jumlah dari detail_transaksi berdasarkan id_transaksi bulan ini
        $detailTransaksi = DetailTransaksi::whereIn('id_transaksi', $idTransaksiBulanIniLunas)
            ->select('id_kategori', DB::raw('SUM(jumlah) as total_jumlah'))
            ->groupBy('id_kategori')
            ->get();

        // Mendapatkan harga dari tabel kategori untuk id_kategori yang diperoleh
        $kategoriIds = $detailTransaksi->pluck('id_kategori');
        $kategoriPrices = Kategori::whereIn('id_kategori', $kategoriIds)->pluck('harga', 'id_kategori');

        // Menghitung total pendapatan
        $totalPendapatan = $detailTransaksi->sum(function ($detail) use ($kategoriPrices) {
            return $kategoriPrices[$detail->id_kategori] * $detail->total_jumlah;
        });

        // Menggabungkan data untuk dikirim ke view
        $data['totalPendapatan'] = $totalPendapatan;

        return view('main.kasir.dashboard', $data);
    }
}
