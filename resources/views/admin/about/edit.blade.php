@extends('layouts.master')

@section('title', 'Edit About Us')

@section('content')

<h1 class="text-2xl font-bold mb-6">Edit About Us</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-6 rounded shadow">
    <form action="{{ route('about.update', $about->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="font-medium">Judul</label>
            <input type="text" name="judul"
                   value="{{ old('judul', $about->judul) }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="font-medium">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                      class="w-full border rounded p-2">{{ old('deskripsi', $about->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="font-medium">Visi</label>
            <input type="text" name="visi"
                   value="{{ old('visi', $about->visi) }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="font-medium">Misi</label>
            <input type="text" name="misi"
                   value="{{ old('misi', $about->misi) }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="font-medium">Gambar</label>
            <input type="file" name="gambar" class="w-full border rounded p-2">

            @if($about->gambar)
                <img src="{{ asset('storage/about/'.$about->gambar) }}"
                     class="w-32 mt-2 rounded">
            @endif
        </div>

        <div class="flex gap-2">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan
            </button>

            <a href="{{ route('about.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </form>
</div>

@endsection
