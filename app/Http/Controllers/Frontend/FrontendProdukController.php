<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;

class FrontendProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::where('stok', '>', 0)->get();
        return view('frontend.produk', compact('produk'));
    }
}
