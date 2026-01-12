@extends('layouts.master')

@section('title', 'Kontak')

@section('content')

<h1 class="text-2xl font-bold mb-6 text-center">Pesan Masuk</h1>

{{-- Notifikasi sukses --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto w-full">
    <table class="w-full bg-white border rounded shadow">
        <thead class="bg-gray-200">
            <tr class="text-center">
                <th class="py-2 px-4 border">No</th>
                <th class="py-2 px-4 border">Nama</th>
                <th class="py-2 px-4 border">No Telepon</th>
                <th class="py-2 px-4 border">Pesan</th>
                <th class="py-2 px-4 border">Status</th>
                <th class="py-2 px-4 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kontak as $d)
            <tr class="text-center">
                <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 border">{{ $d->nama }}</td>
                <td class="py-2 px-4 border">{{ $d->nomor_telepon }}</td>
                <td class="py-2 px-4 border">{{ $d->pesan }}</td>
                <td class="py-2 px-4 border">{{ $d->status }}</td>

                <td class="py-2 px-4 border space-x-4">

                    <!-- Balas WA -->
                    <a href="https://wa.me/62{{ ltrim($d->nomor_telepon,'0') }}"
                       target="_blank"
                       class="inline-flex items-center text-green-600 hover:text-green-800">
                        <i class="fa-brands fa-whatsapp mr-1"></i> Balas
                    </a>

                    <!-- Edit -->
                    <a href="{{ route('admin.kontak.edit', $d->id) }}"
                       class="inline-flex items-center text-blue-600 hover:text-blue-800">
                        <i class="fa-solid fa-pencil mr-1"></i> Edit
                    </a>

                    <!-- Hapus -->
                    <form method="POST"
                          action="{{ route('admin.kontak.destroy', $d->id) }}"
                          class="inline"
                          onsubmit="return confirm('Yakin hapus data?')">
                        @csrf
                        @method('DELETE')

                        <button class="inline-flex items-center text-red-600 hover:text-red-800">
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
