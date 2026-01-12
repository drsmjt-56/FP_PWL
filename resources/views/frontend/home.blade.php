@extends('layouts.frontend')

@section('content')

<div 
    class="relative text-white rounded-2xl p-20 text-center mb-24 bg-cover bg-center shadow-xl"
    style="background-image: url('{{ asset('images/hero.jpg') }}');"
>
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 to-black/40 rounded-2xl"></div>

    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6 tracking-wide">
            MONTU ADVENTURE
        </h1>
        <p class="text-xl text-gray-200 mb-10">
            Sewa Perlengkapan Outdoor Terpercaya
        </p>

        <div class="flex justify-center gap-4">
            <a href="/produk"
               class="bg-matchaDark px-8 py-3 rounded-full font-semibold hover:bg-matcha transition shadow-lg">
                Lihat Produk
            </a>
            <a href="/kontak"
               class="bg-white text-matchaDark px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition shadow-lg">
                Hubungi Kami
            </a>
        </div>
    </div>
</div>


<!-- About Preview -->
<div class="container mx-auto px-6 py-16 text-center mb-24">
    <h2 class="text-4xl font-bold mb-6">Tentang Kami</h2>
    <p class="max-w-4xl mx-auto text-gray-600 leading-relaxed text-lg">
        Montu Adventure menyediakan perlengkapan outdoor lengkap untuk camping,
        hiking, dan petualangan alam. Kami berkomitmen memberikan peralatan
        berkualitas dengan harga terjangkau dan pelayanan cepat.
    </p>
</div>


<!-- Produk Unggulan -->
<div class="container mx-auto px-6 py-12 mb-24">
    <h2 class="text-4xl font-bold text-center mb-12">Produk Unggulan</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

        <!-- Tenda -->
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
            <div class="h-56 bg-gray-100 flex items-center justify-center rounded-t-2xl">
                <img src="{{ asset('images/tenda.jpg') }}" class="max-h-full object-contain">
            </div>
            <div class="p-6 text-center">
                <h4 class="text-xl font-semibold">Tenda Camping</h4>
                <p class="text-matchaDark font-bold mt-2">Rp 50.000 / hari</p>
            </div>
        </div>

        <!-- Carrier -->
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
            <div class="h-56 bg-gray-100 flex items-center justify-center rounded-t-2xl">
                <img src="{{ asset('images/carrier.jpg') }}" class="max-h-full object-contain">
            </div>
            <div class="p-6 text-center">
                <h4 class="text-xl font-semibold">Carrier</h4>
                <p class="text-matchaDark font-bold mt-2">Rp 30.000 / hari</p>
            </div>
        </div>

        <!-- Sleeping Bag -->
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
            <div class="h-56 bg-gray-100 flex items-center justify-center rounded-t-2xl">
                <img src="{{ asset('images/sleepingbag.jpg') }}" class="max-h-full object-contain">
            </div>
            <div class="p-6 text-center">
                <h4 class="text-xl font-semibold">Sleeping Bag</h4>
                <p class="text-matchaDark font-bold mt-2">Rp 20.000 / hari</p>
            </div>
        </div>

    </div>
</div>

<!-- Keunggulan -->
<div class="container mx-auto px-6 py-16 mb-24">

    <!-- Judul & Deskripsi -->
    <div class="text-center mb-14 max-w-3xl mx-auto">
        <h2 class="text-4xl font-bold mb-4">
            Kenapa Memilih Montu Adventure?
        </h2>
        <p class="text-gray-600 text-lg leading-relaxed">
            Alasan kenapa Montu Adventure menjadi pilihan terbaik untuk sewa alat
            camping dan hiking. mulai dari kualitas perlengkapan, harga, hingga
            pelayanan yang cepat dan terpercaya.
        </p>
    </div>

    <!-- Grid Keunggulan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
        <div class="bg-white rounded-2xl shadow-md p-10 hover:shadow-xl transition">
            <div class="text-4xl mb-4"></div>
            <h4 class="text-xl font-semibold mb-2">Harga Terjangkau</h4>
            <p class="text-gray-600">
                Harga kompetitif tanpa mengorbankan kualitas perlengkapan.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-10 hover:shadow-xl transition">
            <div class="text-4xl mb-4"></div>
            <h4 class="text-xl font-semibold mb-2">Peralatan Berkualitas</h4>
            <p class="text-gray-600">
                Perlengkapan selalu dicek dan dirawat demi keamanan pengguna.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-10 hover:shadow-xl transition">
            <div class="text-4xl mb-4"></div>
            <h4 class="text-xl font-semibold mb-2">Pelayanan Cepat</h4>
            <p class="text-gray-600">
                Proses pemesanan cepat, respon admin ramah dan profesional.
            </p>
        </div>
    </div>

</div>



<!-- Testimoni -->
<div class="container mx-auto px-6 py-12 mb-24">
    <h2 class="text-4xl font-bold text-center mb-12">Testimoni Pelanggan</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="bg-white rounded-2xl shadow-md p-8">
            <p class="italic text-gray-600 mb-4">
                "Pelayanan sangat baik, perlengkapannya lengkap dan berkualitas!"
            </p>
            <strong class="text-matchaDark">Alex</strong>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-8">
            <p class="italic text-gray-600 mb-4">
                "Sangat puas dengan sewa tenda dan carrier di Montu Adventure."
            </p>
            <strong class="text-matchaDark">Chealsea</strong>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-8">
            <p class="italic text-gray-600 mb-4">
                "Harga terjangkau dan pengiriman cepat, recommended!"
            </p>
            <strong class="text-matchaDark">Asep</strong>
        </div>
    </div>
</div>


@endsection