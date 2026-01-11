@extends('layouts.master')

@section('title', 'Tambah Produk')

@section('content')

<h1 class="text-2xl font-bold mb-6">Tambah Produk</h1>

<div class="bg-white p-6 rounded shadow">

    <!-- 🔴 DIGANTI -->
    <form action="{{ route('admin.produk.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nama Produk</label>
            <input type="text" name="nama_produk"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Kategori</label>
            <select name="id_kategori" class="w-full border rounded px-3 py-2">
                @foreach($kategori as $k)
                    <option value="{{ $k->id_kategori }}">
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Harga / Hari</label>
            <input type="number" name="harga_sewa_perhari"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Stok</label>
            <input type="number" name="stok"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Gambar</label>
            <input type="file" name="gambar" class="w-full">
        </div>

        <div class="flex gap-2">
            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Simpan
            </button>

            <!-- 🔴 DIGANTI -->
            <a href="{{ route('admin.produk.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
