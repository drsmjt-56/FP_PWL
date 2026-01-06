<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Product;
use App\Models\CaraSewa;

class HomeController extends Controller
{
    public function index()
    {
        // Pastikan data Home SELALU ADA
        $home = Home::firstOrCreate(
            ['id' => 1],
            [
                'judul' => 'Sewa Peralatan Outdoor',
                'deskripsi' => 'Penyewaan peralatan outdoor terlengkap',
                'status' => 'aktif'
            ]
        );

        return view('admin.home.index', [
            'home' => $home,
            'products' => Product::all(),
            'caraSewa' => CaraSewa::orderBy('langkah')->get()
        ]);
    }

    public function update(Request $request)
    {
        // Ambil Home yang PASTI ADA
        $home = Home::firstOrCreate(['id' => 1]);

        $home->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status
        ]);

        // Reset produk unggulan
        Product::query()->update(['is_featured' => false]);

        // Set produk unggulan baru
        if ($request->has('produk_unggulan')) {
            Product::whereIn('id', $request->produk_unggulan)
                   ->update(['is_featured' => true]);
        }

        return redirect()->back()->with('success', 'Home berhasil diperbarui');
    }
}
