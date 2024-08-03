<?php

namespace App\Http\Controllers\Owner;

use App\Models\{User, Cabang, Role};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Constants for view titles
    private const TITLE_INDEX = 'Daftar User';
    private const TITLE_CREATE = 'Tambah User';
    private const TITLE_EDIT = 'Edit User';

    // Index method
    public function index()
    {
        $users = User::with('role', 'cabang')->get();
        return view('main.owner.user.index', [
            'users' => $users,
            'title' => self::TITLE_INDEX
        ]);
    }

    // Create method
    public function create()
    {
        return view('main.owner.user.create', [
            'cabang' => Cabang::all(),
            'role' => Role::all(),
            'title' => self::TITLE_CREATE
        ]);
    }

    // Store method
    public function store(Request $request)
    {
        $this->validateStoreOrUpdate($request);

        User::create([
            'id_role' => $request->role,
            'id_cabang' => $request->cabang,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'foto' => 'profil.png',
        ]);

        return redirect()->route('owner.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Edit method
    public function edit($id)
    {
        return view('main.owner.user.edit', [
            'user' => User::findOrFail($id),
            'cabang' => Cabang::all(),
            'role' => Role::all(),
            'title' => self::TITLE_EDIT
        ]);
    }

    // Update method
    public function update(Request $request, $id)
    {
        $this->validateStoreOrUpdate($request, $id);

        $user = User::findOrFail($id);
        $user->update([
            'id_role' => $request->role,
            'id_cabang' => $request->cabang,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('owner.user.index')->with('success', 'User berhasil diedit.');
    }

    // Destroy method
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('owner.user.index')->with('success', 'User berhasil dihapus.');
    }

    // Private method for validation
    private function validateStoreOrUpdate(Request $request, $id = null)
    {
        $rules = [
            'role' => 'required|exists:role,id_role',
            'cabang' => 'required|exists:cabang,id_cabang',
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username' . ($id ? ",$id,id_user" : ''),
            'password' => 'nullable|string|min:8',
            'no_hp' => 'required|integer',
            'alamat' => 'required|string',
        ];

        $request->validate($rules);
    }
}
