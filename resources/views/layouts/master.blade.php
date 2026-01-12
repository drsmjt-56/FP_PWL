<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Montu Adventure - @yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-gray-50">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-white border-r flex flex-col">

        <!-- LOGO -->
        <a href="{{ route('admin.dashboard') }}"
           class="p-6 flex items-center space-x-3 bg-green-100">
            <img src="{{ asset('images/logo.PNG') }}" class="h-10 w-10">
            <span class="text-2xl font-bold text-green-700">MontuAdventure</span>
        </a>

        <!-- MENU -->
        <nav class="flex-1 px-6 mt-6 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
               class="menu {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
               <i class="fas fa-home"></i> Dashboard
            </a>

            <a href="{{ route('admin.produk.index') }}"
               class="menu {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
               <i class="fas fa-tent"></i> Produk
            </a>

            <a href="{{ route('admin.kategori.index') }}"
               class="menu {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
               <i class="fas fa-list"></i> Kategori
            </a>

            <a href="{{ route('admin.pembayaran.index') }}"
               class="menu {{ request()->routeIs('admin.pembayaran.*') ? 'active' : '' }}">
               <i class="fas fa-wallet"></i> Pembayaran
            </a>

            <a href="{{ route('admin.kontak.index') }}"
               class="menu {{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}">
               <i class="fas fa-envelope"></i> Pesan
            </a>

        </nav>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}" class="p-6 border-t">
            @csrf
            <button class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100 rounded">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8 overflow-auto">
        @yield('content')
    </main>

</div>

<style>
.menu {
    display: flex;
    gap: 10px;
    padding: 10px 16px;
    border-radius: 8px;
}
.menu:hover { background: #dcfce7; }
.menu.active {
    background: #16a34a;
    color: white;
}
</style>

</body>
</html>
