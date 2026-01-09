<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;

class FrontendProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('frontend.produk.index', compact('produk'));
    }
}
