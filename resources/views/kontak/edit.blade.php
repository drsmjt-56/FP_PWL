@extends('layouts.master')

@section('title', 'Edit Kontak')

@section('content')

<h1 class="text-2xl font-bold mb-6 text-center">Edit Status Pesan</h1>

<!-- Wrapper agar card di tengah -->
<div class="flex justify-center">
    <div class="max-w-lg w-full bg-white p-6 rounded shadow">

        <form method="POST" action="{{ url('/kontak/'.$kontak->id) }}">
            @csrf
            @method('PUT')

            <!-- Nama (readonly) -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text" value="{{ $kontak->nama }}" class="w-full border rounded p-2 bg-gray-100" readonly>
            </div>

            <!-- No Telepon (readonly) -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">No Telepon</label>
                <input type="text" value="{{ $kontak->nomor_telepon }}" class="w-full border rounded p-2 bg-gray-100" readonly>
            </div>

            <!-- Pesan (readonly) -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Pesan</label>
                <textarea class="w-full border rounded p-2 bg-gray-100" rows="3" readonly>{{ $kontak->pesan }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label class="block font-semibold mb-1">Status</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="menunggu" {{ $kontak->status=='menunggu'?'selected':'' }}>
                        menunggu
                    </option>
                    <option value="sudah dibalas" {{ $kontak->status=='sudah dibalas'?'selected':'' }}>
                        sudah dibalas
                    </option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="flex gap-2 justify-end">
                <a href="{{ url('/kontak') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                   Kembali
                </a>

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
