<?php

namespace App\Http\Controllers\Owner;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        $detailTransaksi = DetailTransaksi::all();
        return view('main.owner.detail_transaksi.index', compact('detailTransaksi'));
    }

    public function create()
    {
        return view('main.owner.detail_transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|exists:transaksi,id_transaksi',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'jumlah' => 'required|integer',
        ]);

        DetailTransaksi::create($request->all());

        return redirect()->route('detail_transaksi.index')->with('success', 'Detail Transaksi berhasil ditambahkan.');
    }

    public function show(DetailTransaksi $detailTransaksi)
    {
        return view('main.owner.detail_transaksi.show', compact('detailTransaksi'));
    }

    public function edit(DetailTransaksi $detailTransaksi)
    {
        return view('main.owner.detail_transaksi.edit', compact('detailTransaksi'));
    }

    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        $request->validate([
            'id_transaksi' => 'required|exists:transaksi,id_transaksi',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'jumlah' => 'required|integer',
        ]);

        $detailTransaksi->update($request->all());

        return redirect()->route('detail_transaksi.index')->with('success', 'Detail Transaksi berhasil diedit.');
    }

    public function destroy(DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->delete();
        return redirect()->route('detail_transaksi.index')->with('success', 'Detail Transaksi berhasil dihapus.');
    }
}
