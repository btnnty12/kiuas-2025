<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrangTuaController extends Controller
{
    public function index()
    {
        return OrangTua::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:orang_tuas,email',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        return OrangTua::create($data);
    }

    public function show(OrangTua $orangTua)
    {
        return $orangTua;
    }

    public function update(Request $request, OrangTua $orangTua)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:orang_tuas,email,' . $orangTua->id,
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $orangTua->update($data);
        return $orangTua;
    }

    public function destroy(OrangTua $orangTua)
    {
        $orangTua->delete();
        return response()->noContent();
    }
}
