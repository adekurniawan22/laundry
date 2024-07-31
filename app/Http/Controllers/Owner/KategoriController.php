<?php

namespace App\Http\Controllers\Owner;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('main.owner.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('main.owner.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }

    public function show(Kategori $kategori)
    {
        return view('main.owner.kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('main.owner.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');
    }
}
