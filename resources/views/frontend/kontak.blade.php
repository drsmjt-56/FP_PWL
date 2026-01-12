@extends('layouts.frontend')

@section('content')

<div class="bg-gray-100 flex justify-center">

    <div class="w-full max-w-2xl bg-green-50 rounded-xl shadow-md overflow-hidden my-10">

        {{-- Header --}}
        <div class="bg-green-700 text-white text-center py-8">
            <h2 class="text-3xl font-bold">Contact Us</h2>
            <p class="text-sm opacity-90">Informasi resmi untuk menghubungi kami.</p>
        </div>

        {{-- Konten --}}
        <div class="m-6 divide-y">

            <div class="flex items-center gap-4 p-6">
                <x-heroicon-o-map-pin class="w-7 h-7 text-orange-500" />
                <div>
                    <p class="font-semibold">Alamat Toko</p>
                    <p class="text-sm text-gray-600">
                        Jl. Padjajaran, Ring Road Utara, Depok, Sleman, Yogyakarta
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-6">
                <x-heroicon-o-phone class="w-7 h-7 text-green-500" />
                <div>
                    <p class="font-semibold">WhatsApp</p>
                    <p class="text-sm text-gray-600">0857-5081-2173</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-6">
                <x-heroicon-o-envelope class="w-7 h-7 text-emerald-500" />
                <div>
                    <p class="font-semibold">Email</p>
                    <p class="text-sm text-gray-600">montuadventure@gmail.com</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-6">
                <x-heroicon-o-clock class="w-7 h-7 text-gray-500" />
                <div>
                    <p class="font-semibold">Jam Operasional</p>
                    <p class="text-sm text-gray-600">Senin – Minggu, 08.00 – 20.00</p>
                </div>
            </div>

        </div>

        {{-- Map --}}
        <div class="px-6 pb-6">
            <iframe
                class="w-full h-56 rounded-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7906.548780137011!2d110.40631828562475!3d-7.760697238418369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a590072b06ecf%3A0x4ceb436d69d83afa!2sUniversitas%20Amikom%20Yogyakarta%20-%20Kampus%202!5e0!3m2!1sid!2sid!4v1768138364691!5m2!1sid!2sid"
                loading="lazy">
            </iframe>
        </div>

    </div>

</div>

@endsection
