<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login APHT</title>
  <script src="https://unpkg.com/feather-icons"></script> <!-- Feather Icon CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen flex items-center justify-center bg-white md:bg-gradient-to-br md:from-green-600 md:to-green-300">

  <div class="bg-white rounded-xl shadow-lg px-8 py-6 pb-16 w-full max-w-sm">
    <!-- Back Button -->
    <div class="flex items-center mb-4">
      <button class="text-sm text-black flex items-center space-x-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-xs font-medium">Back</span>
      </button>
    </div>

    <!-- Logo -->
    <div class="flex justify-center mb-4">
      <img src="{{ asset('assets/img/Group 44.png') }}" alt="Logo" class="h-20 py-1">
    </div>

    <!-- Title -->
    <h2 class="text-center text-gray-800 font-semibold text-sm mb-6">Login Your Account</h2>

    <!-- Form -->
    <form method="POST" action="">
      @csrf
      <!-- Username -->
      <div class="mb-4">
        <label class="block text-sm text-gray-700 mb-1" for="username">Email</label>
        <input name="email" type="text" class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-green-600 py-1 text-sm" />
      </div>

      <!-- Password with eye toggle -->
      <div class="mb-6 relative">
        <label class="block text-sm text-gray-700 mb-1" for="password">Password</label>
        <input id="password" type="password" name="password"
          class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-green-600 py-1 text-sm pr-10" />
        <div class="absolute right-0 bottom-1 cursor-pointer p-2" onclick="togglePassword()">
          <i id="toggleIcon" data-feather="eye" class="w-4 h-4"></i>
        </div>
      </div>

      <!-- Login button -->
      <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white py-2 rounded font-semibold text-sm transition duration-300">
        Login
      </button>
    </form>

    <!-- Bottom text -->
    <p class="text-xs text-center text-gray-600 mt-4">
      Don’t have an account?
      <a href="#" class="text-blue-600 hover:underline">Contact admin</a>
    </p>

    <!-- Ikon media sosial -->
    <div class="mt-6 flex justify-center space-x-6">
      <a href="#" class="text-gray-600 hover:text-pink-500 transition">
        <i data-feather="instagram" class="w-5 h-5"></i>
      </a>
      <a href="#" class="text-gray-600 hover:text-red-500 transition">
        <i data-feather="globe" class="w-5 h-5"></i>
      </a>
      <a href="#" class="text-gray-600 hover:text-blue-500 transition">
        <i data-feather="twitter" class="w-5 h-5"></i>
      </a>
    </div>
  </div>

  <!-- Feather & Password Toggle Script -->
  <script>
    feather.replace();

    function togglePassword() {
      const input = document.getElementById('password');
      const icon = document.getElementById('toggleIcon');

      if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-feather', 'eye-off');
      } else {
        input.type = 'password';
        icon.setAttribute('data-feather', 'eye');
      }

      feather.replace(); // Refresh icon
    }
  </script>

</body>
</html>
