<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kontak;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
    // Total produk
    $totalProduk = Produk::count();

    // Pesan masuk (dari tabel kontak)
    $pesanMasuk = Kontak::count();

    // Produk stok habis (stok = 0)
    $stokHabis = Produk::where('stok', 0)->count();

    // Produk tersedia (stok > 0)
    $produkTersedia = Produk::where('stok', '>', 0)->count();

    // Produk stok menipis (misal stok <= 5)
    $stokMenipis = Produk::where('stok', '<=', 5)
                        ->orderBy('stok', 'asc')
                        ->limit(5)
                        ->get();

    // Pesan terbaru
    $pesanTerbaru = Kontak::latest()
                        ->limit(5)
                        ->get();

    return view('dashboard', compact(
        'totalProduk',
        'pesanMasuk',
        'stokHabis',
        'produkTersedia',
        'stokMenipis',
        'pesanTerbaru'
    ));
    }

    public function chartData()
    {
    return response()->json([
        'labels' => Produk::pluck('nama_produk'),
        'stok' => Produk::pluck('stok'),
        'tersedia' => Produk::where('stok', '>', 0)->count(),
        'habis' => Produk::where('stok', 0)->count()
    ]);
    }
}


