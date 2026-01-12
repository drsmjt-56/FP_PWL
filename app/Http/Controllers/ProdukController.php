<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

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
            'id_produk' => 'required|unique:produk,id_produk',
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

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id_produk)
    {
        $produk = Produk::findOrFail($id_produk);
        $kategori = Kategori::all();

        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id_produk)
    {
        $produk = Produk::findOrFail($id_produk);

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

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id_produk)
    {
        $produk = Produk::findOrFail($id_produk);

        if ($produk->gambar && file_exists(public_path('uploads/produk/'.$produk->gambar))) {
            unlink(public_path('uploads/produk/'.$produk->gambar));
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
