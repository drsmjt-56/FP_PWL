@extends('layouts.master')

@section('content')
<div class="bg-white p-6 rounded shadow">

<div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Data Produk</h1>
    <a href="{{ route('produk.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
        + Tambah Produk
    </a>
</div>

<table class="w-full border">
<tr class="bg-gray-100">
    <th class="p-2 border">ID</th>
    <th class="p-2 border">Nama</th>
    <th class="p-2 border">Kategori</th>
    <th class="p-2 border">Harga</th>
    <th class="p-2 border">Stok</th>
    <th class="p-2 border">Gambar</th>
    <th class="p-2 border">Aksi</th>
</tr>

@forelse($produk as $p)
<tr>
    <td class="p-2 border">{{ $p->id_produk }}</td>
    <td class="p-2 border">{{ $p->nama_produk }}</td>
    <td class="p-2 border">{{ $p->kategori->nama_kategori ?? '-' }}</td>
    <td class="p-2 border">Rp {{ number_format($p->harga_sewa_perhari) }}</td>
    <td class="p-2 border">{{ $p->stok }}</td>
    <td class="p-2 border text-center">
        @if($p->gambar)
        <img src="{{ asset('uploads/produk/'.$p->gambar) }}" class="w-16 mx-auto rounded">
        @endif
    </td>
    <td class="p-2 border text-center">
        <a href="{{ route('produk.edit',$p->id_produk) }}" class="text-blue-600 mr-2">Edit</a>

        <form action="{{ route('produk.destroy',$p->id_produk) }}" method="POST" class="inline"
              onsubmit="return confirm('Hapus produk?')">
            @csrf
            @method('DELETE')
            <button class="text-red-600">Hapus</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="7" class="text-center p-4 text-gray-500">Data kosong</td>
</tr>
@endforelse
</table>
</div>
@endsection
