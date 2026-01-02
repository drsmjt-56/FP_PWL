<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white w-full max-w-md p-8 rounded-xl shadow-lg">
  <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">
    Login MontuAdventure
  </h2>

  @if (session('failed'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
      {{ session('failed') }}
    </div>
  @endif

  <form action="/login" method="POST" class="space-y-4">
    @csrf

    <input type="email" name="email"
      placeholder="Email"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">

    <input type="password" name="password"
      placeholder="Password"
      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">

    <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
      Login
    </button>
  </form>
</div>

</body>
</html>
