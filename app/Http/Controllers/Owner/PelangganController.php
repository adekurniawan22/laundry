<?php

namespace App\Http\Controllers\Owner;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelangganController extends Controller
{
    // Constants for view titles
    private const TITLE_INDEX = 'Daftar Pelanggan';
    private const TITLE_CREATE = 'Tambah Pelanggan';
    private const TITLE_EDIT = 'Edit Pelanggan';

    // Index method
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('main.owner.pelanggan.index', [
            'pelanggans' => $pelanggans,
            'title' => self::TITLE_INDEX
        ]);
    }

    // Create method
    public function create()
    {
        return view('main.owner.pelanggan.create', [
            'title' => self::TITLE_CREATE,
        ]);
    }
    // Store method
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|integer',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('owner.pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Edit method
    public function edit($id)
    {
        return view('main.owner.pelanggan.edit', [
            'pelanggan' => Pelanggan::findOrFail($id),
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
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($validatedData);

        return redirect()->route('owner.pelanggan.index')->with('success', 'Pelanggan berhasil diedit.');
    }

    // Destroy method
    public function destroy($id)
    {
        Pelanggan::findOrFail($id)->delete();
        return redirect()->route('owner.pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
