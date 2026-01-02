@extends('layouts.master')

@section('title', 'Kontak')

@section('content')

<h1 class="text-2xl font-bold mb-6 text-center">Pesan Masuk</h1>

<!-- Daftar pesan (CRUD admin) -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border rounded shadow">
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
                <td class="py-2 px-4 border space-y-1">

                    <!-- Update status -->
                    <form method="POST" action="/kontak/{{ $d->id }}" class="flex flex-col items-center">
                        @csrf
                        @method('PUT')
                        <select name="status" class="border rounded p-1 mb-1">
                            <option value="menunggu" {{ $d->status=='menunggu'?'selected':'' }}>menunggu</option>
                            <option value="sudah dibalas" {{ $d->status=='sudah dibalas'?'selected':'' }}>sudah dibalas</option>
                        </select>
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">edit</button>
                    </form>

                    <!-- Hapus -->
                    <form method="POST" action="/kontak/{{ $d->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded mt-1">Hapus</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
