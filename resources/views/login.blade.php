<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login MontuAdventure</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-green-50 flex items-center justify-center min-h-screen p-4">
  <div class="bg-white w-full max-w-md p-10 rounded-2xl shadow-2xl border border-green-100">
    
    <div class="text-center mb-8">
      <img src="{{ asset('images/logo.PNG') }}" alt="MontuAdventure Logo" class="mx-auto h-16 w-16 mb-4">
      <h2 class="text-3xl font-bold text-green-700">MontuAdventure</h2>
      <p class="text-gray-500 mt-1">Silakan isi username dan password</p>
    </div>

    @if (session('failed'))
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm shadow-inner border border-red-200">
        {{ session('failed') }}
      </div>
    @endif

    <form action="/login" method="POST" class="space-y-6">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukkan email"
          class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-300 focus:border-green-400 transition shadow-sm">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan password"
          class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-300 focus:border-green-400 transition shadow-sm">
      </div>

      <button type="submit"
        class="w-full bg-green-600 text-white py-3 rounded-xl font-semibold hover:bg-green-700 transition shadow-md hover:shadow-lg">
        Masuk
      </button>
    </form>
  </div>
</body>
</html>
