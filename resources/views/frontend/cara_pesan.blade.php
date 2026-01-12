@extends('layouts.frontend')

@section('content')

{{-- JUDUL --}}
<h1 class="text-3xl font-bold text-matchaDark mb-10 text-center">
    Cara Sewa Alat
</h1>

{{-- FLASH MESSAGE --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-8 text-center">
        {{ session('success') }}
    </div>
@endif

{{-- LANGKAH-LANGKAH --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">

    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
        <div class="text-4xl font-bold text-matchaDark mb-2">1</div>
        <h3 class="font-semibold mb-1">Pilih Alat</h3>
        <p class="text-sm text-gray-500">
            Pilih alat hiking atau camping yang tersedia.
        </p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
        <div class="text-4xl font-bold text-matchaDark mb-2">2</div>
        <h3 class="font-semibold mb-1">Tentukan Tanggal</h3>
        <p class="text-sm text-gray-500">
            Tentukan tanggal pemakaian alat.
        </p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
        <div class="text-4xl font-bold text-matchaDark mb-2">3</div>
        <h3 class="font-semibold mb-1">Cek Ketersediaan</h3>
        <p class="text-sm text-gray-500">
            Isi form untuk menanyakan ketersediaan barang.
        </p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
        <div class="text-4xl font-bold text-matchaDark mb-2">4</div>
        <h3 class="font-semibold mb-1">Konfirmasi Admin</h3>
        <p class="text-sm text-gray-500">
            Admin akan menghubungi via WhatsApp.
        </p>
    </div>

</div>

{{-- SYARAT & KETENTUAN --}}
<div class="bg-white rounded-lg shadow-md p-6 mb-12">
    <h2 class="text-xl font-semibold text-matchaDark mb-4">
        Syarat & Ketentuan
    </h2>

    <ul class="list-disc list-inside text-gray-600 space-y-2">
        <li>Membawa identitas asli (KTP/KTM)</li>
        <li>Kerusakan alat menjadi tanggung jawab penyewa</li>
        <li>Denda berlaku jika terlambat mengembalikan barang</li>
    </ul>
</div>

{{-- FORM CEK KETERSEDIAAN --}}
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold text-matchaDark mb-6 text-center">
        Form Cek Ketersediaan Barang
    </h2>

    <form action="{{ route('frontend.kontak.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block mb-1 font-semibold">Nama Pelanggan</label>
            <input
                type="text"
                name="nama"
                class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-matcha"
                required
            >
        </div>

        <div>
            <label class="block mb-1 font-semibold">No. Telepon</label>
            <input
                type="text"
                name="nomor_telepon"
                class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-matcha"
                required
            >
        </div>

        <div>
            <label class="block mb-1 font-semibold">Pesan</label>
            <textarea
                name="pesan"
                rows="4"
                class="w-full border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-matcha"
                required
            ></textarea>
        </div>

        <div class="text-center pt-4">
            <button
                type="submit"
                class="bg-matcha text-white px-6 py-2 rounded hover:bg-matchaDark transition font-semibold"
            >
                Kirim Pesan
            </button>
        </div>
    </form>
</div>

@endsection
