<?php

namespace App\Http\Controllers\Owner;

use App\Models\Cabang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CabangController extends Controller
{
    public function index()
    {
        $cabang = Cabang::all();
        return view('main.owner.cabang.index', compact('cabang'));
    }

    public function create()
    {
        return view('main.owner.cabang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'nullable|exists:user,id_user',
        ]);

        Cabang::create($request->all());

        return redirect()->route('cabang.index')->with('success', 'Cabang created successfully.');
    }

    public function show(Cabang $cabang)
    {
        return view('main.owner.cabang.show', compact('cabang'));
    }

    public function edit(Cabang $cabang)
    {
        return view('main.owner.cabang.edit', compact('cabang'));
    }

    public function update(Request $request, Cabang $cabang)
    {
        $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'nullable|exists:user,id_user',
        ]);

        $cabang->update($request->all());

        return redirect()->route('cabang.index')->with('success', 'Cabang updated successfully.');
    }

    public function destroy(Cabang $cabang)
    {
        $cabang->delete();
        return redirect()->route('cabang.index')->with('success', 'Cabang deleted successfully.');
    }
}
