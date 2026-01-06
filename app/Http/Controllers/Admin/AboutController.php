<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    // TAMPIL TABEL
    public function index()
    {
        $about = About::first();

        // auto create kalau belum ada
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

    // HALAMAN EDIT
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $about = About::findOrFail($id);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ];

        if ($request->hasFile('gambar')) {
            if ($about->gambar && Storage::exists('public/about/'.$about->gambar)) {
                Storage::delete('public/about/'.$about->gambar);
            }

            $file = $request->file('gambar');
            $namaFile = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/about', $namaFile);

            $data['gambar'] = $namaFile;
        }

        $about->update($data);

        return redirect()
            ->route('about.index')
            ->with('success', 'About Us berhasil diperbarui');
    }
}
