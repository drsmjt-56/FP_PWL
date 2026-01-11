@extends('layouts.master')

@section('title', 'Kategori')

@section('content')
<h1 class="text-2xl font-bold mb-6">Data Kategori</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admin.kategori.create') }}"
   class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
   + Tambah Kategori
</a>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nama Kategori</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $k)
            <tr class="text-center">
                <td class="border px-4 py-2">{{ $k->id_kategori }}</td>
                <td class="border px-4 py-2">{{ $k->nama_kategori }}</td>
                <td class="border px-4 py-2">{{ $k->status }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('admin.kategori.edit', $k->id_kategori) }}"
                       class="inline-flex items-center text-blue-600 mr-4 hover:text-blue-800">
                    <i class="fa-solid fa-pencil mr-1"></i> Edit
                    </a>

                    <form action="{{ route('admin.kategori.destroy', $k->id_kategori) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')"
                                class="text-red-600 hover:text-red-800">
                        <i class="fa-solid fa-trash mr-1"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
