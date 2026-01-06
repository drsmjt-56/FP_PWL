@extends('layouts.master')

@section('content')

<div class="flex justify-center">
  <div class="w-full max-w-xl bg-white p-6 rounded shadow">

    <h1 class="text-xl font-bold mb-6 text-center">Edit Produk</h1>

    <form method="POST"
          action="{{ route('produk.update', $produk->id_produk) }}"
          enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <label class="block mb-1 font-semibold">Kategori</label>
      <select name="id_kategori" class="w-full border p-2 mb-4 rounded">
        @foreach($kategori as $k)
          <option value="{{ $k->id_kategori }}"
            {{ $produk->id_kategori == $k->id_kategori ? 'selected' : '' }}>
            {{ $k->nama_kategori }}
          </option>
        @endforeach
      </select>

      <label class="block mb-1 font-semibold">Nama Produk</label>
      <input type="text" name="nama_produk"
             value="{{ $produk->nama_produk }}"
             class="w-full border p-2 mb-4 rounded">

      <label class="block mb-1 font-semibold">Harga Sewa / Hari</label>
      <input type="number" name="harga_sewa_perhari"
             value="{{ $produk->harga_sewa_perhari }}"
             class="w-full border p-2 mb-4 rounded">

      <label class="block mb-1 font-semibold">Stok</label>
      <input type="number" name="stok"
             value="{{ $produk->stok }}"
             class="w-full border p-2 mb-4 rounded">

      <label class="block mb-1 font-semibold">Gambar Saat Ini</label>
      @if($produk->gambar)
        <img src="{{ asset('uploads/produk/'.$produk->gambar) }}"
             class="w-24 mb-3 rounded">
      @else
        <p class="text-gray-400 mb-3">Tidak ada gambar</p>
      @endif

      <label class="block mb-1 font-semibold">Ganti Gambar</label>
      <input type="file" name="gambar"
             class="w-full border p-2 mb-6 rounded">

      <div class="flex justify-between">
        <a href="{{ route('produk.index') }}" class="text-gray-600 hover:underline">
          Kembali
        </a>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          Update
        </button>
      </div>

    </form>
  </div>
</div>

@endsection
