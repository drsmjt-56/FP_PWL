<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();
        return view('kontak.index', compact('kontak'));
    }

    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('kontak.edit', compact('kontak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $kontak = Kontak::findOrFail($id);
        $kontak->update($request->only('status'));

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Status berhasil diubah');
    }

    public function destroy($id)
    {
        Kontak::destroy($id);

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
