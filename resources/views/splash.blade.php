<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Splash Screen</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <style>
    .fade-out {
      animation: fadeOut 1s ease-out forwards;
      animation-delay: 2s;
    }

    @keyframes fadeOut {
      to {
        opacity: 0;
        visibility: hidden;
      }
    }
  </style>
</head>
<body class="bg-green-700 flex items-center justify-center h-screen">

  <div id="splash" class="text-center text-white fade-out">
    <img src="{{ asset('assets/img/Group 44.png') }}" alt="Logo" class="h-24 mx-auto mb-4 animate-bounce">
    <h1 class="text-2xl font-bold">Selamat Datang di APHT</h1>
    <p class="text-sm">Memuat halaman, harap tunggu...</p>
  </div>

  <script>
    setTimeout(function () {
      window.location.href = "/login"; // redirect ke halaman utama (login atau dashboard)
    }, 3000); // 3 detik
  </script>

</body>
</html>
