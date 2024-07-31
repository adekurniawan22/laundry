<?php

namespace App\Http\Controllers\Owner;

use App\Models\{Cabang, User};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CabangController extends Controller
{
    // Constants for view titles
    private const TITLE_INDEX = 'Daftar Cabang';
    private const TITLE_CREATE = 'Tambah Cabang';
    private const TITLE_EDIT = 'Edit Cabang';

    // Index method
    public function index()
    {
        $cabangs = Cabang::with('user')->get();
        return view('main.owner.cabang.index', [
            'cabangs' => $cabangs,
            'title' => self::TITLE_INDEX
        ]);
    }

    // Create method
    public function create()
    {
        return view('main.owner.cabang.create', [
            'title' => self::TITLE_CREATE,
            'user' => User::all(),
        ]);
    }

    // Store Method
    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|exists:user,id_user',
        ]);

        Cabang::create($request->all());

        return redirect()->route('owner.cabang.index')->with('success', 'Cabang created successfully.');
    }

    // Edit method
    public function edit($id)
    {
        return view('main.owner.cabang.edit', [
            'cabang' => Cabang::findOrFail($id),
            'user' => User::all(),
            'title' => self::TITLE_EDIT
        ]);
    }

    // Update method
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required',
        ]);

        // Update data cabang
        $cabang = Cabang::findOrFail($id);
        $cabang->update($validatedData);

        return redirect()->route('owner.cabang.index')->with('success', 'Cabang updated successfully.');
    }

    // Destroy method
    public function destroy($id)
    {
        Cabang::findOrFail($id)->delete();
        return redirect()->route('owner.cabang.index')->with('success', 'Cabang deleted successfully.');
    }
}
