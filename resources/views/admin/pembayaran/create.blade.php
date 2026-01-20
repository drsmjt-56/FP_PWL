@extends('layouts.master')

@section('title', 'Tambah Pembayaran')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 max-w-2xl mx-auto mt-6">
    
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pembayaran.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Nama Penyewa</label>
            <input type="text" name="nama_penyewa" 
                   value="{{ old('nama_penyewa') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">No HP</label>
            <input type="text" name="no_hp" 
                   value="{{ old('no_hp') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Total Bayar</label>
            <input type="number" name="total_bayar" 
                   value="{{ old('total_bayar') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Metode Pembayaran</label>
            <select name="metode_bayar"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="">-- Pilih Metode --</option>
                <option value="Cash" {{ old('metode_bayar') == 'Cash' ? 'selected' : '' }}>Cash</option>
                <option value="Transfer" {{ old('metode_bayar') == 'Transfer' ? 'selected' : '' }}>Transfer</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" 
                   value="{{ old('tanggal_bayar') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 mb-1">Status</label>
            <select name="status"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diterima" {{ old('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Simpan
            </button>
            <a href="{{ route('admin.pembayaran.index') }}"
               class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
