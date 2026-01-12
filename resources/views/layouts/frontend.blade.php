<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'M0ntu Adventure')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Custom color --}}
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

    {{-- NAVBAR --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            {{-- LOGO --}}
            <h1 class="text-2xl font-bold text-matchaDark">
                M0ntu Adventure
            </h1>

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

    {{-- CONTENT --}}
    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>
    {{-- FOOTER --}}
    <footer class="bg-matchaDark text-white">
        <div class="max-w-7xl mx-auto px-6 py-8 grid md:grid-cols-3 gap-6">

            <div>
                <h2 class="text-xl font-bold">M0ntu Adventure</h2>
                <p class="text-sm mt-2">
                    Penyedia sewa alat camping & outdoor terpercaya.
                </p>
            </div>

            <div>
                <h3 class="font-semibold mb-2">Sosial Media</h3>
                <ul class="space-y-1 text-sm">
                    <li>WhatsApp</li>
                    <li>Instagram</li>
                    <li>TikTok</li>
                </ul>
            </div>

            <div class="text-sm text-right">
                © {{ date('Y') }} M0ntu Adventure <br>
                All rights reserved
            </div>

        </div>
    </footer>

</body>
</html>
