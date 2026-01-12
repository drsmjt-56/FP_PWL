<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;

class FrontendKontakController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_telepon' => 'required',
            'pesan' => 'required',
        ]);

        Kontak::create($request->only('nama', 'nomor_telepon', 'pesan'));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
