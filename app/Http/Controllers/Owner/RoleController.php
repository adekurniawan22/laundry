<?php

namespace App\Http\Controllers\Owner;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('main.owner.role.index', compact('roles'));
    }

    public function create()
    {
        return view('main.owner.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|max:255',
        ]);

        Role::create($request->all());

        return redirect()->route('role.index')->with('success', 'Role created successfully.');
    }

    public function show(Role $role)
    {
        return view('main.owner.role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('main.owner.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nama_role' => 'required|string|max:255',
        ]);

        $role->update($request->all());

        return redirect()->route('role.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role deleted successfully.');
    }
}
