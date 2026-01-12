<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Montu Adventure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        matcha: '#4CAF50',
                        matchaDark: '#2E7D32',
                        cream: '#FAF7F2'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-cream text-gray-800">

{{-- ================= NAVBAR ================= --}}
<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- LOGO --}}
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}"
                 alt="Montu Adventure"
                 class="h-10 w-auto">


            <span class="text-xl font-bold text-matchaDark">
                Montu Adventure
            </span>
        </div>

            {{-- MENU --}}

        <nav class="space-x-6 text-sm font-medium">
            <a href="{{ route('frontend.home') }}" class="hover:text-matcha">Home</a>
            <a href="{{ route('frontend.about') }}" class="hover:text-matcha">About</a>
            <a href="{{ route('frontend.produk') }}" class="hover:text-matcha">Produk</a>
            <a href="{{ route('cara_pesan') }}" class="hover:text-matcha">Cara Sewa</a>
            <a href="{{ route('frontend.kontak') }}" class="hover:text-matcha">Contact</a>
        </nav>

    </div>
</header>

{{-- ================= CONTENT ================= --}}
<main class="max-w-7xl mx-auto px-6 py-10 min-h-[70vh]">
    @yield('content')
</main>

{{-- ================= FOOTER ================= --}}
<footer class="bg-gradient-to-b from-matchaDark to-green-900 text-white">
    <div class="max-w-7xl mx-auto px-6 py-12 grid gap-10 md:grid-cols-3 items-start">

        <div>
            <img src="{{ asset('images/logo.png') }}"
                 class="h-12 mb-4"
                 alt="Montu Adventure">

            <h2 class="text-xl font-bold text-white mb-2">
                Montu Adventure
            </h2>

            <p class="text-base text-green-100 leading-relaxed">
                Penyedia sewa alat camping & outdoor
                terpercaya untuk menemani setiap
                petualangan alam Anda.
            </p>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-4">Layanan Populer</h3>
            <ul class="space-y-2 text-base text-green-100">
                <li>Sewa Tenda Camping</li>
                <li>Paket Camping Lengkap</li>
                <li>Peralatan Masak Outdoor</li>
                <li>Perlengkapan Hiking</li>
            </ul>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>

            <ul class="space-y-3 text-base text-green-100 mb-4">
                <li>📍 Sleman, Yogyakarta</li>
                <li>📞 0857-5081-2173</li>
                <li>✉️ montuadventure@gmail.com</li>
            </ul>

            <div class="flex gap-4 mt-4 text-xl">
                <a href="https://www.facebook.com/?locale=id_ID" class="hover:text-white transition">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/" class="hover:text-white transition">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/id-ID/" class="hover:text-white transition">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="border-t border-green-700 text-center text-base py-5 text-green-200">
        © {{ date('Y') }} Montu Adventure • By Degem
    </div>
</footer>
<!-- Montu Adventure -->
</body>
</html>
