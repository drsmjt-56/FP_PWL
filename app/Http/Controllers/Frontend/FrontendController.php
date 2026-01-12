<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
    }

   public function caraPesan()
   {
    return view('frontend.cara_pesan'); 
    }
    
    public function kontak()
{
    return view('frontend.kontak'); 
}


}
