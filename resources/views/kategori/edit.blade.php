@extends('layouts.master')

@section('title', 'Edit Kategori')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('kategori.update', $kategori->id_kategori) }}"
      method="POST"
      class="bg-white p-6 rounded shadow w-full md:w-1/2">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-medium">ID Kategori</label>
        <input type="text" value="{{ $kategori->id_kategori }}"
               class="w-full border rounded p-2 bg-gray-100" readonly>
    </div>

    <div class="mb-4">
        <label class="block font-medium">Nama Kategori</label>
        <input type="text" name="nama_kategori"
               value="{{ $kategori->nama_kategori }}"
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Status</label>
        <select name="status" class="w-full border rounded p-2">
            <option value="tersedia"
                {{ $kategori->status == 'tersedia' ? 'selected' : '' }}>
                Tersedia
            </option>
            <option value="tidak tersedia"
                {{ $kategori->status == 'tidak tersedia' ? 'selected' : '' }}>
                Tidak Tersedia
            </option>
        </select>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>
@endsection
