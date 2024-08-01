<?php

namespace App\Http\Controllers\Kasir;

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
        return view('main.kasir.pelanggan.index', [
            'pelanggans' => $pelanggans,
            'title' => self::TITLE_INDEX
        ]);
    }

    // Create method
    public function create()
    {
        return view('main.kasir.pelanggan.create', [
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

        return redirect()->route('kasir.pelanggan.index')->with('success', 'Pelanggan created successfully.');
    }

    // Edit method
    public function edit($id)
    {
        return view('main.kasir.pelanggan.edit', [
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

        return redirect()->route('kasir.pelanggan.index')->with('success', 'Pelanggan updated successfully.');
    }

    // Destroy method
    public function destroy($id)
    {
        Pelanggan::findOrFail($id)->delete();
        return redirect()->route('kasir.pelanggan.index')->with('success', 'Pelanggan deleted successfully.');
    }
}
