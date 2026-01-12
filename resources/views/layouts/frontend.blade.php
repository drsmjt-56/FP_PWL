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
<body class="bg-cream text-gray-800">

    {{-- NAVBAR --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            {{-- LOGO --}}
            <h1 class="text-2xl font-bold text-matchaDark">
                Montu Adventure
            </h1>

            {{-- MENU --}}
            <nav class="space-x-6 text-sm font-medium">
                <a href="#" class="hover:text-matcha">Home</a>
                <a href="#" class="hover:text-matcha">About</a>
                <a href="#" class="hover:text-matcha">Produk</a>
                <a href="#" class="hover:text-matcha">Cara Sewa</a>
                <a href="#" class="hover:text-matcha">Contact</a>
            </nav>
        </div>

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
    </footer>

</body>
</html>