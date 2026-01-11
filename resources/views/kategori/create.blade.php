@extends('layouts.master')

@section('title', 'Tambah Kategori')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Kategori</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.kategori.store') }}" method="POST" {{-- DIUBAH --}}
      class="bg-white p-6 rounded shadow w-full md:w-1/2">
    @csrf

    <div class="mb-4">
        <label class="block font-medium">ID Kategori</label>
        <input type="text" name="id_kategori"
               class="w-full border rounded p-2"
               placeholder="Contoh: KAT001">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Nama Kategori</label>
        <input type="text" name="nama_kategori"
               class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Status</label>
        <select name="status" class="w-full border rounded p-2">
            <option value="tersedia">Tersedia</option>
            <option value="tidak tersedia">Tidak Tersedia</option>
        </select>
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Simpan
    </button>
</form>
@endsection
