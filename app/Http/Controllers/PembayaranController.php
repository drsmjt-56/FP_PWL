<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    // TAMPIL SEMUA
    public function index()
    {
        $pembayarans = Pembayaran::orderBy('created_at', 'desc')->get();
        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    // FORM EDIT (WAJIB ADA)
    public function edit($id)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->firstOrFail();
        return view('admin.pembayaran.edit', compact('pembayaran'));
    }

    // UPDATE STATUS (UNTUK FORM ADMIN)
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
            'keterangan' => 'nullable'
        ]);

        Pembayaran::where('id_pembayaran', $id)->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Status pembayaran berhasil diperbarui');
    }

    // HAPUS
    public function destroy($id)
    {
        Pembayaran::where('id_pembayaran', $id)->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus');
    }

    // ==========================
    // API / USER SIDE (OPSIONAL)
    // ==========================
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
