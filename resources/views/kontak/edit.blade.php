@extends('layouts.master')

@section('title', 'Edit Kontak')

@section('content')

<h1 class="text-2xl font-bold mb-6 text-center">Edit Status Pesan</h1>

<div class="flex justify-center">
    <div class="max-w-lg w-full bg-white p-6 rounded shadow">

        <form method="POST"
              action="{{ route('admin.kontak.update', $kontak->id) }}"> {{-- ✅ DIUBAH --}}
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text"
                       value="{{ $kontak->nama }}"
                       class="w-full border rounded p-2 bg-gray-100"
                       readonly>
            </div>

            <!-- Telepon -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">No Telepon</label>
                <input type="text"
                       value="{{ $kontak->nomor_telepon }}"
                       class="w-full border rounded p-2 bg-gray-100"
                       readonly>
            </div>

            <!-- Pesan -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Pesan</label>
                <textarea class="w-full border rounded p-2 bg-gray-100"
                          rows="3"
                          readonly>{{ $kontak->pesan }}</textarea>
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
            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.kontak.index') }}" {{-- ✅ DIUBAH --}}
                   class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                    Kembali
                </a>

                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
