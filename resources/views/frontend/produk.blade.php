@extends('layouts.frontend')

@section('content')

<h1 class="text-3xl font-bold text-matchaDark mb-6">
    Produk Camping & Hiking
</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

    @forelse ($produk as $item)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">

            {{-- GAMBAR --}}
            <div class="h-48 bg-gray-100 flex items-center justify-center">
                @if ($item->gambar)
                    <img 
                        src="{{ asset('storage/produk/'.$item->gambar) }}" 
                        alt="{{ $item->nama_produk }}"
                        class="h-full object-cover"
                    >
                @else
                    <span class="text-gray-400 text-sm">No Image</span>
                @endif
            </div>

            {{-- ISI --}}
            <div class="p-4 space-y-2">
                <h2 class="font-semibold text-lg">
                    {{ $item->nama_produk }}
                </h2>

                <p class="text-sm text-gray-500">
                    Rp {{ number_format($item->harga_sewa_perhari, 0, ',', '.') }} / hari
                </p>

                <p class="text-sm">
                    Stok: 
                    <span class="font-semibold {{ $item->stok <= 3 ? 'text-red-500' : 'text-green-600' }}">
                        {{ $item->stok }}
                    </span>
                </p>

                {{-- BUTTON WA --}}
                <a 
                    href="https://wa.me/62XXXXXXXXXX?text=Saya mau sewa {{ urlencode($item->nama_produk) }}"
                    target="_blank"
                    class="block text-center bg-matcha text-white py-2 rounded-md hover:bg-matchaDark transition"
                >
                    Sewa via WhatsApp
                </a>
            </div>

        </div>
    @empty
        <p class="text-gray-500">Produk belum tersedia.</p>
    @endforelse

</div>

@endsection
