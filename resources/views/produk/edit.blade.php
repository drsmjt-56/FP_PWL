@extends('layouts.master')

@section('title', 'Edit Produk')

@section('content')

<h1 class="text-2xl font-bold mb-6">Edit Produk</h1>

<div class="bg-white p-6 rounded shadow">

    <!-- 🔴 DIGANTI -->
    <form action="{{ route('admin.produk.update', $produk->id_produk) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Nama Produk</label>
            <input type="text" name="nama_produk"
                   value="{{ $produk->nama_produk }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Kategori</label>
            <select name="id_kategori" class="w-full border rounded px-3 py-2">
                @foreach($kategori as $k)
                    <option value="{{ $k->id_kategori }}"
                        {{ $produk->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Harga / Hari</label>
            <input type="number" name="harga_sewa_perhari"
                   value="{{ $produk->harga_sewa_perhari }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Stok</label>
            <input type="number" name="stok"
                   value="{{ $produk->stok }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Gambar</label>
            <input type="file" name="gambar">
            @if($produk->gambar)
                <img src="{{ asset('uploads/produk/'.$produk->gambar) }}"
                     class="w-20 mt-2 rounded">
            @endif
        </div>

        <div class="flex gap-2">
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700>
                Update
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
