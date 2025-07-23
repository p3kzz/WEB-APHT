<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white rounded-2xl shadow p-8 w-full max-w-sm">
    <!-- Back Button -->
    <button class="flex items-center text-sm text-black mb-6">
      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
      Back
    </button>

    <!-- Title -->
    <h2 class="text-4xl font-bold text-black text-center">Login</h2>
    <p class="text-center text-gray-600 text-sm mt-1 mb-6">Login Your Account</p>

    <!-- Form -->
    <form>
      <div class="mb-4">
        <label class="block text-sm font-semibold mb-1">Username</label>
        <input type="text" class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-black py-1" />
      </div>

      <div class="mb-6">
        <label class="block text-sm font-semibold mb-1">Password</label>
        <input type="password" class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-black py-1" />
      </div>

      <button type="submit" class="w-full bg-green-500 text-white font-bold py-2 rounded-lg hover:bg-green-600 transition">
        Login
      </button>
    </form>

    <!-- Footer -->
    <p class="text-sm text-center text-gray-600 mt-4">
      Don’t have an account?
      <a href="#" class="text-blue-500 font-medium hover:underline">Contact admin</a>
    </p>
  </div>
</body>
</html>
