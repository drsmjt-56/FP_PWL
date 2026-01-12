@extends('layouts.master')

@section('title', 'Edit Produk')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Produk</h1>

@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-6 rounded shadow">
    <form action="{{ route('admin.produk.update', $produk->id_produk) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">ID Produk</label>
            <input type="text"
                   value="{{ $produk->id_produk }}"
                   class="w-full border rounded px-3 py-2 bg-gray-100"
                   readonly>
        </div>

        {{-- NAMA PRODUK --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Nama Produk</label>
            <input type="text"
                   name="nama_produk"
                   value="{{ old('nama_produk', $produk->nama_produk) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- KATEGORI --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Kategori</label>
            <select name="id_kategori"
                    class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id_kategori }}"
                        {{ $produk->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- HARGA --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Harga / Hari</label>
            <input type="number"
                   name="harga_sewa_perhari"
                   value="{{ old('harga_sewa_perhari', $produk->harga_sewa_perhari) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- STOK --}}
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Stok</label>
            <input type="number"
                   name="stok"
                   value="{{ old('stok', $produk->stok) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- GAMBAR --}}
        <div class="mb-6">
            <label class="block mb-1 font-semibold">Gambar Produk</label>
            <input type="file"
                   name="gambar"
                   class="w-full border rounded px-3 py-2">

            @if ($produk->gambar)
                <img src="{{ asset('uploads/produk/'.$produk->gambar) }}"
                     class="w-32 mt-3 rounded">
            @endif
        </div>

        <div class="flex gap-2">
            <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Update
            </button>

            <a href="{{ route('admin.produk.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
