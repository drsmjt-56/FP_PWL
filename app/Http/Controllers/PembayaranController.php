<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
 
    public function index()
    {
        $pembayarans = Pembayaran::orderBy('created_at', 'desc')->get();
        return view('admin.pembayaran.index', compact('pembayarans'));
    }


    public function edit($id)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->firstOrFail();
        return view('admin.pembayaran.edit', compact('pembayaran'));
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'nama_penyewa' => 'required|string|max:255',
        'no_hp' => 'required|string|max:20',
        'total_bayar' => 'required|numeric',
        'metode_bayar' => 'required|in:Transfer,Cash',
        'tanggal_bayar' => 'required|date',
        'status' => 'required|in:pending,diterima,ditolak',
    ]);

    Pembayaran::where('id_pembayaran', $id)->update([
        'nama_penyewa' => $request->nama_penyewa,
        'no_hp' => $request->no_hp,
        'total_bayar' => $request->total_bayar,
        'metode_bayar' => $request->metode_bayar,
        'tanggal_bayar' => $request->tanggal_bayar,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('admin.pembayaran.index')
        ->with('success', 'Data pembayaran berhasil diperbarui');
}

 public function destroy($id)
{
    Pembayaran::where('id_pembayaran', $id)->delete();

    return redirect()
        ->route('admin.pembayaran.index')
        ->with('success', 'Data pembayaran berhasil dihapus');
}


    public function store(Request $request)
    {
        $request->validate([
            'nama_penyewa' => 'required',
            'no_hp' => 'required',
            'total_bayar' => 'required|numeric',
            'metode_bayar' => 'required|in:Transfer,Cash',
            'tanggal_bayar' => 'required|date'
        ]);

        $pembayaran = Pembayaran::create([
            'id_pembayaran' => 'PAY-' . strtoupper(Str::random(8)),
            'nama_penyewa' => $request->nama_penyewa,
            'no_hp' => $request->no_hp,
            'total_bayar' => $request->total_bayar,
            'metode_bayar' => $request->metode_bayar,
            'tanggal_bayar' => $request->tanggal_bayar,
            'status' => 'pending',
            'keterangan' => null
        ]);

        return response()->json([
            'message' => 'Pembayaran berhasil dikirim',
            'data' => $pembayaran
        ], 201);
    }
}
