@extends('layouts.frontend')

@section('title', 'Tentang Kami')

@section('content')
<div class="bg-[#fefce8] min-h-screen">

    <div class="max-w-5xl mx-auto px-6 py-12">

        <!-- Judul Halaman -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-green-700">
                Tentang Kami
            </h1>
            <p class="mt-2 text-gray-600">
                Mengenal lebih dekat Montu Adventure
            </p>
        </div>

        <!-- Tentang Kami -->
        <div class="bg-white rounded-xl shadow p-8 mb-10 border-l-8 border-green-600">
            <p class="text-gray-700 leading-relaxed text-justify">
                Montu Adventure adalah penyedia perlengkapan outdoor yang
                berfokus pada kebutuhan aktivitas alam terbuka seperti
                hiking, camping, dan cooking outdoor. Kami hadir untuk
                membantu para pecinta alam mendapatkan perlengkapan yang
                berkualitas, aman, dan nyaman digunakan.
                <br><br>
                Dengan mengutamakan kualitas produk dan kepuasan pelanggan,
                Montu Adventure berkomitmen memberikan pelayanan terbaik
                serta menjadi partner terpercaya dalam setiap perjalanan
                dan petualangan Anda.
            </p>
        </div>

        <!-- Visi & Misi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Visi -->
            <div class="bg-[#dcfce7] rounded-xl p-8 shadow">
                <h3 class="text-xl font-semibold text-green-700 mb-3">
                    Visi
                </h3>
                <p class="text-gray-700">
                    Menjadi penyedia perlengkapan outdoor terpercaya
                    yang mendukung petualangan alam yang aman, nyaman,
                    dan berkelanjutan.
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-[#dcfce7] rounded-xl p-8 shadow">
                <h3 class="text-xl font-semibold text-green-700 mb-3">
                    Misi
                </h3>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Menyediakan produk outdoor berkualitas tinggi</li>
                    <li>Memberikan pelayanan yang cepat dan ramah</li>
                    <li>Mendukung komunitas pecinta alam Indonesia</li>
                    <li>Menawarkan harga yang terjangkau dan transparan</li>
                </ul>
            </div>

        </div>

    </div>

</div>
@endsection
