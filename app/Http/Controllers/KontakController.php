<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index() //menampilkan semua data
    {
        $kontak = Kontak::all();
        return view('kontak.index', compact('kontak'));
    }

    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('kontak.edit', compact('kontak'));
    }

    public function store(Request $request) //validasi input dari user
    {
        Kontak::create($request->validate([
            'nama' => 'required',
            'nomor_telepon' => 'required|numeric',
            'pesan' => 'required',
        ]));

        return redirect()->back()->with('success', 'pesan berhasil dikirim');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $kontak = Kontak::findOrFail($id);
        $kontak->update($request->only('status'));

       return redirect('/kontak')->with('success', 'Status berhasil diubah');

    }

    public function destroy(string $id)
    {
        Kontak::destroy($id);
        return redirect()->back()->with('success', 'Pesan berhasil dihapus');

    }
}
