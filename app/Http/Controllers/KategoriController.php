<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // READ
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    // FORM CREATE
    public function create()
    {
        return view('kategori.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori'   => 'required|unique:kategori,id_kategori',
            'nama_kategori' => 'required',
        ]);

        Kategori::create([
            'id_kategori'   => $request->id_kategori,
            'nama_kategori' => $request->nama_kategori,
            'status'        => $request->status ?? 'tersedia',
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        return view('kategori.edit', compact('kategori'));
    }

    // UPDATE
    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'status'        => 'required',
        ]);

        $kategori = Kategori::findOrFail($id_kategori);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'status'        => $request->status,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    // DELETE
    public function destroy($id_kategori)
    {
        Kategori::findOrFail($id_kategori)->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
