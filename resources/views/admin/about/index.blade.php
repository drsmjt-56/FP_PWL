@extends('layouts.master')

@section('title', 'Kelola About Us')

@section('content')

<h1 class="text-2xl font-bold mb-6">Kelola About Us</h1>

{{-- pesan sukses --}}
@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

{{-- pesan error --}}
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- FORM EDIT --}}
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Form About Us</h2>

        <form action="/admin/about/{{ $about->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="font-medium">Judul</label>
                <input type="text" name="judul" value="{{ $about->judul }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-3">
                <label class="font-medium">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                          class="w-full border rounded p-2">{{ $about->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label class="font-medium">Visi</label>
                <input type="text" name="visi" value="{{ $about->visi }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-3">
                <label class="font-medium">Misi</label>
                <input type="text" name="misi" value="{{ $about->misi }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="font-medium">Gambar</label>
                <input type="file" name="gambar" class="w-full border rounded p-2">
            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan Perubahan
            </button>
        </form>
    </div>

    {{-- PREVIEW DATA --}}
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Preview About Us</h2>

        <h3 class="text-xl font-bold mb-2">
            {{ $about->judul ?: 'Judul belum diisi' }}
        </h3>

        <p class="text-gray-700 mb-4">
            {{ $about->deskripsi ?: 'Deskripsi belum diisi' }}
        </p>

        <div class="mb-4">
            <h4 class="font-semibold">Visi</h4>
            <p class="text-gray-600">
                {{ $about->visi ?: '-' }}
            </p>
        </div>

        <div class="mb-4">
            <h4 class="font-semibold">Misi</h4>
            <p class="text-gray-600">
                {{ $about->misi ?: '-' }}
            </p>
        </div>

        @if($about->gambar)
            <div class="mt-4">
                <img src="{{ asset('storage/about/'.$about->gambar) }}"
                     class="rounded w-full max-h-64 object-cover">
            </div>
        @else
            <p class="text-gray-400 italic">Belum ada gambar</p>
        @endif
    </div>

</div>

@endsection
