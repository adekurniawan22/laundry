<?php

namespace App\Http\Controllers\Owner;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    // Constants for view titles
    private const TITLE_INDEX = 'Daftar Kategori';
    private const TITLE_CREATE = 'Tambah Kategori';
    private const TITLE_EDIT = 'Edit Kategori';

    // Index method
    public function index()
    {
        $kategoris = Kategori::all();
        return view('main.owner.kategori.index', [
            'kategoris' => $kategoris,
            'title' => self::TITLE_INDEX
        ]);
    }

    // Create method
    public function create()
    {
        return view('main.owner.kategori.create', [
            'title' => self::TITLE_CREATE,
        ]);
    }

    // Store method
    public function store(Request $request)
    {
        // Validasi input dengan membersihkan harga terlebih dahulu
        $validatedData = $request->validate([
            'kategori' => 'required|string|max:255',
            'harga' => 'required|string|regex:/^Rp\. \d+(\.\d{3})*$/', // Validasi format harga
        ]);

        // Bersihkan nilai harga dari "Rp." dan format pemisah ribuan
        $harga = str_replace(['Rp. ', '.'], '', $validatedData['harga']);

        // Ubah harga menjadi integer
        $harga = (int) $harga;

        // Buat kategori dengan harga yang sudah dibersihkan
        Kategori::create([
            'kategori' => $validatedData['kategori'],
            'harga' => $harga,
        ]);

        return redirect()->route('owner.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }


    // Edit method
    public function edit($id)
    {
        return view('main.owner.kategori.edit', [
            'kategori' => Kategori::findOrFail($id),
            'title' => self::TITLE_EDIT
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input dengan membersihkan harga terlebih dahulu
        $validatedData = $request->validate([
            'kategori' => 'required|string|max:255',
            'harga' => 'required|string|regex:/^Rp\. \d+(\.\d{3})*$/', // Validasi format harga
        ]);

        // Bersihkan nilai harga dari "Rp." dan format pemisah ribuan
        $harga = str_replace(['Rp. ', '.'], '', $validatedData['harga']);

        // Ubah harga menjadi integer
        $harga = (int) $harga;

        // Update data kategori
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'kategori' => $validatedData['kategori'],
            'harga' => $harga,
        ]);

        return redirect()->route('owner.kategori.index')->with('success', 'Kategori berhasil diedit.');
    }


    // Destroy method
    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->route('owner.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
