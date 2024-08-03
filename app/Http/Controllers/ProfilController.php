<?php

namespace App\Http\Controllers;

use App\Models\{User, Cabang, Role};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    private const TITLE_EDIT = 'Profil';

    // Edit method
    public function edit()
    {
        $id = session('id_user');
        return view('profil', [
            'user' => User::findOrFail($id),
            'title' => self::TITLE_EDIT
        ]);
    }

    // Update method
    public function update(Request $request)
    {
        $id = session('id_user');
        $this->validateStoreOrUpdate($request, $id);

        $user = User::findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('profil.edit')->with('success', 'Profil berhasil diedit.');
    }

    // Private method for validation
    private function validateStoreOrUpdate(Request $request, $id = null)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username' . ($id ? ",$id,id_user" : ''),
            'password' => 'nullable|string|min:8',
            'no_hp' => 'required|integer',
            'alamat' => 'required|string',
        ];

        $request->validate($rules);
    }
}
