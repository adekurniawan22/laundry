<?php

namespace App\Http\Controllers\Kasir;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Kategori;

class TransaksiController extends Controller
{
    // Constants for view titles
    private const TITLE_INDEX = 'Daftar Transaksi';
    private const TITLE_CREATE = 'Tambah Transaksi';
    private const TITLE_EDIT = 'Edit Transaksi';

    // Index method
    public function index()
    {
        $transaksis = Transaksi::with('user', 'pelanggan')->get();
        return view('main.kasir.transaksi.index', [
            'transaksis' => $transaksis,
            'title' => self::TITLE_INDEX
        ]);
    }

    // Create method
    public function create()
    {
        $userId = session('id_user');

        // Ambil data cabang berdasarkan id_user di session
        $user = User::with('cabang')->find($userId);
        $cabang = $user->cabang->nama_cabang;
        $alamatCabang = $user->cabang->alamat;
        $noHpCabang = $user->cabang->user->no_hp;

        // Ambil nota terakhir dan tambahkan 1
        $latestNota = Transaksi::max('id_transaksi') + 1;

        // Ambil nama kasir dari model User
        $kasir = $user->nama;

        return view('main.kasir.transaksi.create', [
            'pelanggans' => Pelanggan::all(),
            'kategoris' => Kategori::all(),
            'cabang' => $cabang,
            'alamat_cabang' => $alamatCabang,
            'no_hp_cabang' => $noHpCabang,
            'nota' => $latestNota,
            'kasir' => $kasir,
            'title' => self::TITLE_CREATE,
        ]);
    }

    // Store method
    public function store(Request $request)
    {
        if (isset($_POST['checkbox_new_client'])) {
            $pelanggan_baru = [
                'nama' => $_POST['nama_pelanggan'],
                'no_hp' => $_POST['no_hp_pelanggan'],
            ];

            Pelanggan::create($pelanggan_baru);
            $id_pelanggan = Pelanggan::latest()->first()->id_pelanggan;
        } else {
            $id_pelanggan = $_POST['pelanggan'];
        }

        // Ambil data cabang berdasarkan id_user di session
        $user = User::with('cabang')->find(session('id_user'));
        $id_cabang = $user->cabang->id_cabang;

        Transaksi::create([
            'id_user' => session('id_user'),
            'id_pelanggan' => $id_pelanggan,
            'id_cabang' => $id_cabang,
            'tgl_transaksi' => $_POST['tgl_transaksi'],
            'tgl_selesai' => $_POST['tgl_selesai'],
            'status' => $_POST['status'],
        ]);

        $details = json_decode($_POST['selected_values']);
        foreach ($details as $detail) {
            DetailTransaksi::create([
                'id_transaksi' => Transaksi::latest()->first()->id_transaksi,
                'id_kategori' => $detail->id,
                'jumlah' => $detail->quantity,
            ]);
        }

        return redirect()->route('kasir.transaksi.index')->with('success', 'Transaksi created successfully.');
    }

    // Edit method
    public function edit($id)
    {
        return view('main.kasir.transaksi.edit', [
            'pelanggan' => Transaksi::findOrFail($id),
            'title' => self::TITLE_EDIT
        ]);
    }

    // Update method
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|integer',
        ]);

        // Update data pelanggan
        $pelanggan = Transaksi::findOrFail($id);
        $pelanggan->update($validatedData);

        return redirect()->route('kasir.transaksi.index')->with('success', 'Transaksi updated successfully.');
    }

    // Destroy method
    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect()->route('kasir.transaksi.index')->with('success', 'Transaksi deleted successfully.');
    }
}
