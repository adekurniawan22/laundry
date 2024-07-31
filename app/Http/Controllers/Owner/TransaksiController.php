<?php

namespace App\Http\Controllers\Owner;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('main.owner.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        return view('main.owner.transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:user,id_user',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'tgl_transaksi' => 'required|date',
            'tgl_selesai' => 'nullable|date',
            'status' => 'required|string|max:255',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi created successfully.');
    }

    public function show(Transaksi $transaksi)
    {
        return view('main.owner.transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        return view('main.owner.transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'id_user' => 'required|exists:user,id_user',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'tgl_transaksi' => 'required|date',
            'tgl_selesai' => 'nullable|date',
            'status' => 'required|string|max:255',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi updated successfully.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi deleted successfully.');
    }
}
