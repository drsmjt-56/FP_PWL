<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Montu Adventure</title>
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

<body class="bg-cream text-gray-800 flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-matchaDark">
                Montu Adventure
            </h1>

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
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-matchaDark text-green-100">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>

            <ul class="space-y-3 text-base mb-4">
                <li>📍 Sleman, Yogyakarta</li>
                <li>📞 0857-5081-2173</li>
                <li>✉️ montuadventure@gmail.com</li>
            </ul>
        </div>

        <div class="border-t border-green-700 text-center text-base py-5 text-green-200">
            © {{ date('Y') }} Montu Adventure • By Degem
        </div>
    </footer>

</body>
</html>
