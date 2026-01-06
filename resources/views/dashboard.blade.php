@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
  <h1 class="text-2xl font-bold mb-4">
    Selamat datang, {{ session('user_email') }} !
  </h1>
  <p class="text-sm text-gray-600">
      Role: <span class="font-semibold">{{ session('user_type') }}</span>
  </p>
<!--atas-->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Total Produk</p>
        <p class="text-3xl font-bold text-gray-800">48</p>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Pesan Masuk</p>
        <p class="text-3xl font-bold text-gray-800">12</p>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Stok Habis</p>
        <p class="text-3xl font-bold text-red-500">5</p>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Produk Tersedia</p>
        <p class="text-3xl font-bold text-green-600">32</p>
    </div>
</div>

<!--bawah-->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- STOK MENIPIS -->
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Produk Stok Menipis</h3>
        <table class="w-full text-sm">
            <tbody>
                <tr class="border-b">
                    <td class="py-2">Tenda Dome</td>
                    <td class="py-2 text-right font-semibold">2</td>
                </tr>
                <tr class="border-b">
                    <td class="py-2">Carrier 60L</td>
                    <td class="py-2 text-right font-semibold">1</td>
                </tr>
                <tr>
                  <td class="py-2">Matras Outdoor</td>
                    <td class="py-2 text-right font-semibold">3</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!--pesan-->
     <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Pesan Terbaru</h3>
        <ul class="space-y-3 text-sm text-gray-700">
            <li>• Andi: <span class="italic text-gray-500">"Tenda ready?"</span></li>
            <li>• Sinta: <span class="italic text-gray-500">"Sewa 3 hari bisa?"</span></li>
        </ul>
    </div>

    </div>

<!-- ACTION BUTTON -->
<div class="mt-6 flex gap-4">
    <a href="#" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        + Tambah Produk
    </a>
    <a href="#" class="px-5 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
        Lihat Pesan
    </a>
</div>
@endsection
