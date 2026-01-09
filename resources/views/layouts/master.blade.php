<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Montu Adventure - @yield('title')</title>
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-..."
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap"
    rel="stylesheet"
  />
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">
  <div class="flex h-screen">

    <!-- SIDEBAR -->
  <aside class="w-72 bg-white flex flex-col h-screen">
  <div class="p-6 flex items-center space-x-3 bg-green-100">
    <img src="{{ asset('images/logo.PNG') }}" alt="Logo" class="h-10 w-10 object-contain" />
    <h1 class="text-2xl font-bold text-green-700 tracking-tight">MontuAdventure</h1>
  </div>


  <nav class="flex-1 mt-6 px-6 space-y-2 overflow-y-auto">
    <a href="{{ url('/') }}" class="block px-4 py-2.5 bg-green-100 text-green-800 rounded-lg font-medium">
      Dashboard
    </a>

    <a href="{{ url('/pembayaran') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white transition duration-300 ease-in-out">
      <i class="fas fa-wallet mr-2 text-green-700"></i> Pembayaran
    </a>

    <a href="{{ url('/produk') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white transition duration-300 ease-in-out">
      <i class="fas fa-tent mr-2 text-green-700"></i> Produk
    </a>

    <a href="{{ url('/kategori') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white transition duration-300 ease-in-out">
      <i class="fas fa-list mr-2 text-green-700"></i> Kategori
    </a>

    <a href="{{ url('/kontak') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white transition duration-300 ease-in-out">
      <i class="fas fa-envelope mr-2 text-green-700"></i> Kontak
    </a>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="block w-full text-left px-4 py-2.5 text-red-600 hover:bg-red-100 hover:text-red-700 rounded-lg transition duration-300 ease-in-out">
        Logout
      </button>
    </form>
  </nav>
</aside>


    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col overflow-hidden">
      <header class="bg-white shadow-sm border-b border-gray-200 p-4 md:hidden sticky top-0 z-50">
        <h1 class="text-lg font-bold text-green-700">Montu Adventure</h1>
      </header>

      <div class="flex-1 overflow-auto p-4 md:p-8">
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r shadow-sm">
          <p class="font-bold">Berhasil!</p>
          <p>{{ session('success') }}</p>
        </div>
        @endif

        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @stack('scripts')
      </div>
    </main>

  </div>
</body>
</html>
