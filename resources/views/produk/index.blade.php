@extends('layouts.master')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Produk</h1>

@if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admin.produk.create') }}"
   class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded">
    + Tambah Produk
</a>

<table class="w-full border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border p-2 text-center">ID</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Kategori</th>
            <th class="border p-2">Harga</th>
            <th class="border p-2">Stok</th>
            <th class="border p-2 text-center">Gambar</th>
            <th class="border p-2 text-center">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($produk as $item)
        <tr>
            <td class="border p-2 text-center">
                {{ $item->id_produk }}
            </td>

            <td class="border p-2">{{ $item->nama_produk }}</td>

            <td class="border p-2">
                {{ $item->kategori->nama_kategori ?? '-' }}
            </td>

            <td class="border p-2">
                Rp {{ number_format($item->harga_sewa_perhari, 0, ',', '.') }}
            </td>

            <td class="border p-2 text-center">{{ $item->stok }}</td>

            <td class="border p-2 text-center">
                @if ($item->gambar)
                    <img src="{{ asset('uploads/produk/'.$item->gambar) }}"
                         class="w-14 h-14 object-cover rounded mx-auto">
                @else
                    -
                @endif
            </td>

            <td class="border p-2">
                <div class="flex justify-center items-center gap-4">
                    <a href="{{ route('admin.produk.edit', $item->id_produk) }}"
                       class="inline-flex items-center text-blue-600 hover:text-blue-800">
                        <i class="fa-solid fa-pencil mr-1"></i> Edit
                    </a>

                    <form action="{{ route('admin.produk.destroy', $item->id_produk) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')"
                                class="text-red-600 hover:text-red-800">
                            <i class="fa-solid fa-trash mr-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
