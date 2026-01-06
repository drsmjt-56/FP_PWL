<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Product;
use App\Models\CaraSewa;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::first();

        if ($home->status == 'nonaktif') {
            return view('frontend.maintenance');
        }

        return view('frontend.home', [
            'home' => $home,
            'produkUnggulan' => Product::where('is_featured', true)->get(),
            'caraSewa' => CaraSewa::orderBy('langkah')->get()
        ]);
    }
}
