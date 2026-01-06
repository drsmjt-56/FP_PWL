<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_produk' => 'required',
            'id_kategori' => 'nullable',
            'nama_produk' => 'required',
            'harga_sewa_perhari' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/produk'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        Produk::create($data);

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk','kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $data = $request->validate([
            'id_kategori' => 'nullable',
            'nama_produk' => 'required',
            'harga_sewa_perhari' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && file_exists(public_path('uploads/produk/'.$produk->gambar))) {
                unlink(public_path('uploads/produk/'.$produk->gambar));
            }

            $file = $request->file('gambar');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/produk'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        $produk->update($data);

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && file_exists(public_path('uploads/produk/'.$produk->gambar))) {
            unlink(public_path('uploads/produk/'.$produk->gambar));
        }

        $produk->delete();

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil dihapus');
    }
}
