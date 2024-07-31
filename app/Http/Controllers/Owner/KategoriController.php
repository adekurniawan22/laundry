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
        $request->validate([
            'kategori' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        Kategori::create($request->all());

        return redirect()->route('owner.kategori.index')->with('success', 'Kategori created successfully.');
    }

    // Edit method
    public function edit($id)
    {
        return view('main.owner.kategori.edit', [
            'kategori' => Kategori::findOrFail($id),
            'title' => self::TITLE_EDIT
        ]);
    }

    // Update method
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kategori' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        // Update data kategori
        $kategori = Kategori::findOrFail($id);
        $kategori->update($validatedData);

        return redirect()->route('owner.kategori.index')->with('success', 'Kategori updated successfully.');
    }

    // Destroy method
    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->route('owner.kategori.index')->with('success', 'Kategori deleted successfully.');
    }
}
