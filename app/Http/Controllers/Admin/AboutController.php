<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    // READ
    public function index()
    {
        $about = About::first();

        // AUTO CREATE JIKA DATA BELUM ADA
        if (!$about) {
            $about = About::create([
                'judul' => '',
                'deskripsi' => '',
                'visi' => '',
                'misi' => '',
                'gambar' => null,
            ]);
        }

        return view('admin.about.index', compact('about'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $about = About::findOrFail($id);

        // data teks
        $data = $request->only([
            'judul',
            'deskripsi',
            'visi',
            'misi',
        ]);

        // upload gambar
        if ($request->hasFile('gambar')) {

            // hapus gambar lama jika ada
            if ($about->gambar) {
                Storage::delete('public/about/' . $about->gambar);
            }

            $file = $request->file('gambar');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/about', $namaFile);

            $data['gambar'] = $namaFile;
        }

        $about->update($data);

        return redirect()->back()->with('success', 'About Us berhasil diperbarui');
    }
}
