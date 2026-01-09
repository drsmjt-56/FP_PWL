@extends('layouts.master')

@section('title', 'Pembayaran')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Data Pembayaran</h2>
        <p class="text-sm text-gray-500">Daftar pembayaran yang masuk</p>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">No</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">Nama Penyewa</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">No HP</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">Total Bayar</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">Metode</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">Status</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-600">Tanggal</th>
                    <th class="px-6 py-3 text-center font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse ($pembayarans as $pembayaran)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-medium">{{ $pembayaran->nama_penyewa }}</td>
                    <td class="px-6 py-4">{{ $pembayaran->no_hp }}</td>
                    <td class="px-6 py-4">
                        Rp {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">{{ $pembayaran->metode_bayar }}</td>

                    <td class="px-6 py-4">
                        @if ($pembayaran->status === 'pending')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                Menunggu
                            </span>
                        @elseif ($pembayaran->status === 'diterima')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Diterima
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                                Ditolak
                            </span>
                        @endif
                    </td>

                    <td class="px-6 py-4">{{ $pembayaran->tanggal_bayar }}</td>

                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="{{ route('pembayaran.edit', $pembayaran->id_pembayaran) }}"
                           class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md bg-yellow-400 hover:bg-yellow-500 text-white transition">
                            <i class="fa-solid fa-pen mr-1"></i> Edit
                        </a>

                        <form action="{{ route('pembayaran.destroy', $pembayaran->id_pembayaran) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data pembayaran?')"
                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md bg-red-500 hover:bg-red-600 text-white transition">
                                <i class="fa-solid fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-6 text-center text-gray-500">
                        Data pembayaran belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
