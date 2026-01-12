@extends('layouts.frontend')

@section('content')

<div class="text-center mb-16">
    <h1 class="text-4xl font-bold text-matchaDark mb-3">
        Jelajahi Perlengkapan Outdoor Terbaik
    </h1>

    <p class="text-gray-600 max-w-2xl mx-auto">
        Pilihan perlengkapan camping & hiking favorit untuk menemani
        petualangan alam kamu dengan nyaman dan aman.
    </p>
</div>

{{-- SECTION 1 --}}
<section class="mb-20">
<div class="text-center mb-10">
    <h2 class="text-2xl font-bold text-gray-800">
        Produk Camping Populer
    </h2>
    <p class="text-sm text-gray-500">
        Peralatan pilihan yang paling sering disewa pelanggan
    </p>
</div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($produk as $item)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                {{-- GAMBAR --}}
                <div class="h-48 bg-gray-100 flex items-center justify-center">
                    @if ($item->gambar)
                        <img
                            src="{{ asset('uploads/produk/'.$item->gambar) }}"
                            alt="{{ $item->nama_produk }}"
                            class="h-full w-full object-cover"
                        >
                    @else
                        <span class="text-gray-400 text-sm">No Image</span>
                    @endif
                </div>

                <div class="p-4 space-y-3">
                    <h3 class="font-semibold text-lg">
                        {{ $item->nama_produk }}
                    </h3>

                    <p class="text-matcha font-bold text-lg">
                        Rp {{ number_format($item->harga_sewa_perhari, 0, ',', '.') }}
                        <span class="text-sm text-gray-500 font-normal">/ hari</span>
                    </p>

                    <p class="text-sm">
                        Stok:
                        <span class="{{ $item->stok <= 3 ? 'text-red-500' : 'text-green-600' }} font-semibold">
                            {{ $item->stok }}
                        </span>
                    </p>

                    <a
                        href="https://wa.me/62XXXXXXXXXX?text=Saya%20ingin%20menyewa%20{{ urlencode($item->nama_produk) }}"
                        target="_blank"
                        class="block text-center bg-matcha text-white py-2 rounded-md hover:bg-matchaDark transition"
                    >
                        Booking Sekarang
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</section>

{{-- SECTION 2 --}}
<section>
    <div class="text-center mb-10">
        <h2 class="text-2xl font-bold text-gray-800">
            Rekomendasi Perlengkapan Outdoor
        </h2>
        <p class="text-sm text-gray-500">
            Solusi praktis untuk perjalanan alam bebas
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach ($produk as $item)
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-5">

                <h3 class="font-semibold text-lg mb-2">
                    {{ $item->nama_produk }}
                </h3>

                <p class="text-gray-600 text-sm mb-4">
                    Cocok untuk kebutuhan camping & hiking harian.
                </p>

                <div class="flex justify-between items-center">
                    <span class="text-matcha font-bold">
                        Rp {{ number_format($item->harga_sewa_perhari, 0, ',', '.') }}/hari
                    </span>

                    <a
                        href="https://wa.me/62XXXXXXXXXX"
                        class="text-sm text-matcha hover:underline"
                    >
                        Detail →
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</section>

@endsection
