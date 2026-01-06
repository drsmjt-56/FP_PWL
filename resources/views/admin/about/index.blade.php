@extends('layouts.master')

@section('title', 'Kelola About Us')

@section('content')

<h1 class="text-2xl font-bold mb-6">Kelola About Us</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white p-6 rounded shadow">
    <table class="w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">No</th>
                <th class="border px-3 py-2">Judul</th>
                <th class="border px-3 py-2">Deskripsi</th>
                <th class="border px-3 py-2">Visi</th>
                <th class="border px-3 py-2">Misi</th>
                <th class="border px-3 py-2">Gambar</th>
                <th class="border px-3 py-2">Kelola</th>
            </tr>
        </thead>

        <tbody>
            <tr class="text-center">
                <td class="border px-3 py-2">1</td>
                <td class="border px-3 py-2">{{ $about->judul ?: '-' }}</td>
                <td class="border px-3 py-2 text-left">
                    {{ \Illuminate\Support\Str::limit($about->deskripsi, 50) }}
                </td>
                <td class="border px-3 py-2">{{ $about->visi ?: '-' }}</td>
                <td class="border px-3 py-2">{{ $about->misi ?: '-' }}</td>
                <td class="border px-3 py-2">
                    @if($about->gambar)
                        <img src="{{ asset('storage/about/'.$about->gambar) }}"
                             class="w-20 h-14 object-cover rounded mx-auto">
                    @else
                        -
                    @endif
                </td>
                <td class="border px-3 py-2">
                    <a href="{{ route('about.edit', $about->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                        Edit
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
