@extends('layouts.master')

@section('title', 'Edit Pembayaran')

@section('content')

<h1 class="text-2xl font-bold mb-6 text-center">Edit Pembayaran</h1>

<div class="flex justify-center">
    <div class="max-w-lg w-full bg-white p-6 rounded shadow">

        <form method="POST"
              action="{{ route('admin.pembayaran.update', $pembayaran->id_pembayaran) }}">
            @csrf
            @method('PUT')

            <!-- Nama Penyewa -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Penyewa</label>
                <input type="text"
                       name="nama_penyewa"
                       value="{{ old('nama_penyewa', $pembayaran->nama_penyewa) }}"
                       class="w-full border rounded p-2">
            </div>

            <!-- No HP -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">No HP</label>
                <input type="text"
                       name="no_hp"
                       value="{{ old('no_hp', $pembayaran->no_hp) }}"
                       class="w-full border rounded p-2">
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Metode Pembayaran</label>
                <select name="metode_bayar"
                        class="w-full border rounded p-2">
                    <option value="Transfer" {{ $pembayaran->metode_bayar == 'Transfer' ? 'selected' : '' }}>
                        Transfer
                    </option>
                    <option value="Cash" {{ $pembayaran->metode_bayar == 'Cash' ? 'selected' : '' }}>
                        Cash
                    </option>
                </select>
            </div>

            <!-- Tanggal Bayar -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Tanggal Bayar</label>
                <input type="date"
                       name="tanggal_bayar"
                       value="{{ old('tanggal_bayar', $pembayaran->tanggal_bayar) }}"
                       class="w-full border rounded p-2">
            </div>

            <!-- Total Bayar -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Jumlah Pembayaran</label>
                <input type="number"
                       name="total_bayar"
                       value="{{ old('total_bayar', $pembayaran->total_bayar) }}"
                       class="w-full border rounded p-2">
            </div>


            <div class="mb-6">
                <label class="block font-semibold mb-1">Status Pembayaran</label>
                <select name="status"
                        class="w-full border rounded p-2">
                    <option value="pending" {{ $pembayaran->status == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>
                    <option value="diterima" {{ $pembayaran->status == 'diterima' ? 'selected' : '' }}>
                        Diterima
                    </option>
                    <option value="ditolak" {{ $pembayaran->status == 'ditolak' ? 'selected' : '' }}>
                        Ditolak
                    </option>
                </select>
            </div>

           
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
