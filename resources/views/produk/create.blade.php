@extends('layouts.master')

@section('title', 'Tambah Produk')

@section('content')

<div class="flex justify-center">
  <div class="w-full max-w-xl bg-white p-6 rounded shadow">

    <h1 class="text-xl font-bold mb-6 text-center">Tambah Produk</h1>

    <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
      @csrf

      <label class="block mb-1 font-semibold">ID Produk</label>
      <input type="text" name="id_produk"
             class="w-full border p-2 mb-4 rounded">

      <label class="block mb-1 font-semibold">Kategori</label>
      <select name="id_kategori" class="w-full border p-2 mb-4 rounded">
        <option value="">-- Pilih Kategori --</option>
        @foreach($kategori as $k)
          <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
        @endforeach
      </select>

      <label class="block mb-1 font-semibold">Nama Produk</label>
      <input type="text" name="nama_produk"
             class="w-full border p-2 mb-4 rounded">

      <label class="block mb-1 font-semibold">Harga Sewa / Hari</label>
      <input type="number" name="harga_sewa_perhari"
             class="w-full border p-2 mb-4 rounded">

      <label class="block mb-1 font-semibold">Stok</label>
      <input type="number" name="stok"
             class="w-full border p-2 mb-4 rounded">

      <label class="block mb-1 font-semibold">Gambar Produk</label>
      <input type="file" name="gambar"
             class="w-full border p-2 mb-6 rounded">

      <div class="flex justify-between">
        <a href="{{ route('produk.index') }}" class="text-gray-600 hover:underline">
          Kembali
        </a>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          Simpan
        </button>
      </div>

    </form>
  </div>
</div>

@endsection
