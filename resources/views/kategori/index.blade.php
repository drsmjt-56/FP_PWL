@extends('layouts.master')

@section('title', 'Kategori')

@section('content')

<h1 class="text-2xl font-bold mb-6">Data Kategori</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white p-6 rounded shadow">

    <!-- Tombol Tambah -->
    <div class="flex justify-between mb-4">
        <a href="{{ route('admin.kategori.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Tambah Kategori
        </a>
    </div>

    <table class="w-full border">
        <tr class="bg-gray-100">
            <th class="p-2 border">ID</th>
            <th class="p-2 border">Nama Kategori</th>
            <th class="p-2 border">Status</th>
            <th class="p-2 border">Aksi</th>
        </tr>

        @forelse($kategori as $k)
        <tr class="text-center">
            <td class="p-2 border">{{ $k->id_kategori }}</td>
            <td class="p-2 border">{{ $k->nama_kategori }}</td>
            <td class="p-2 border">
                <span class="px-2 py-1 rounded text-sm
                    {{ $k->status == 'tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $k->status }}
                </span>
            </td>

            <td class="p-2 border">
                <!-- Edit -->
                <a href="{{ route('admin.kategori.edit', $k->id_kategori) }}"
                   class="inline-flex items-center text-blue-600 mr-4 hover:text-blue-800">
                    <i class="fa-solid fa-pencil mr-1"></i> Edit
                </a>

                <!-- Hapus -->
                <form action="{{ route('admin.kategori.destroy', $k->id_kategori) }}"
                      method="POST"
                      class="inline-flex items-center"
                      onsubmit="return confirm('Yakin hapus kategori ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:text-red-800">
                        <i class="fa-solid fa-trash mr-1"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center p-4 text-gray-500">
                Data kategori masih kosong
            </td>
        </tr>
        @endforelse
    </table>
</div>

@endsection
