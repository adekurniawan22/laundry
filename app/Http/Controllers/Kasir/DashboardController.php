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

        // Mengatur zona waktu ke Asia/Jakarta
        $now = Carbon::now('Asia/Jakarta');

        // Mendapatkan nomor bulan saat ini
        $monthNumber = $now->month;

        // Array nama bulan dalam bahasa Indonesia
        $bulanIndonesia = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        // Mendapatkan nama bulan dalam bahasa Indonesia
        $data['currentMonthName'] = $bulanIndonesia[$monthNumber];

        // Mendapatkan tanggal awal dan akhir bulan ini
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

        // Ambil data cabang berdasarkan id_user di session
        $user = User::with('cabang')->find(session('id_user'));
        $id_cabang = $user->cabang->id_cabang;

        // Menghitung transaksiCount hanya untuk id_cabang yang sama dengan session id_user
        $data['transaksiCount'] = Transaksi::where('id_cabang', $id_cabang)->count();

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
