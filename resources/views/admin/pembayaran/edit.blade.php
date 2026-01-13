@extends('layouts.master')

@section('title', 'Edit Pembayaran')

@section('content')

<h1 class="text-2xl font-bold mb-6 text-center">Edit Status Pembayaran</h1>

<div class="flex justify-center">
    <div class="max-w-lg w-full bg-white p-6 rounded shadow">

        <form method="POST"
              action="{{ route('admin.pembayaran.update', $pembayaran->id_pembayaran) }}">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text"
                       value="{{ $pembayaran->nama }}"
                       class="w-full border rounded p-2 bg-gray-100"
                       readonly>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Metode Pembayaran</label>
                <input type="text"
                       value="{{ $pembayaran->metode_pembayaran }}"
                       class="w-full border rounded p-2 bg-gray-100"
                       readonly>
            </div>

            <!-- Tanggal Bayar -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Tanggal Bayar</label>
                <input type="date"
                       value="{{ $pembayaran->tanggal_bayar }}"
                       class="w-full border rounded p-2 bg-gray-100"
                       readonly>
            </div>

            <!-- Jumlah -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Jumlah Pembayaran</label>
                <input type="number"
                       value="{{ $pembayaran->jumlah }}"
                       class="w-full border rounded p-2 bg-gray-100"
                       readonly>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label class="block font-semibold mb-1">Status Pembayaran</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="pending" {{ $pembayaran->status=='pending'?'selected':'' }}>
                        Pending
                    </option>
                    <option value="lunas" {{ $pembayaran->status=='lunas'?'selected':'' }}>
                        Lunas
                    </option>
                    <option value="gagal" {{ $pembayaran->status=='gagal'?'selected':'' }}>
                        Gagal
                    </option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.pembayaran.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                    Kembali
                </a>

                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
