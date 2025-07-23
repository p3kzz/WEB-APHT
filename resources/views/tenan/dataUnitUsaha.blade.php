<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard APHT</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex flex-col lg:flex-row">
    <!-- Sidebar -->
    <aside class="w-full lg:w-64 bg-white shadow h-auto lg:h-screen p-4 flex flex-col justify-between">
      <!-- Top Section -->
      <div>
        <div class="text-green-800 font-bold text-xl mb-2 lg:mb-6">OPHT</div>
        <div class="text-sm text-gray-600 mb-4 lg:mb-10">Perusahaan Daerah Sumenep</div>
        <nav class="space-y-2 lg:space-y-4">
          <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
            <div class="w-5 h-5 bg-gray-200 rounded"><img src="image/dashboard.png" alt=""></div><span>Dashboard</span>
          </a>
          <a href="#" class="flex items-center space-x-2 text-green-700 font-semibold">
            <div class="w-5 h-5 bg-gray-200 rounded"><img src="image/dashboard.png" alt=""></div><span>Data Unit Usaha</span>
          </a>
          <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
            <div class="w-5 h-5 bg-gray-200 rounded"><img src="image/dashboard.png" alt=""></div><span>Data Laporan</span>
          </a>
          <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
            <div class="w-5 h-5 bg-gray-200 rounded"><img src="image/dashboard.png" alt=""></div><span>Data Pengajuan</span>
          </a>
          <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
            <div class="w-5 h-5 bg-gray-200 rounded"><img src="image/dashboard.png" alt=""></div><span>Data Produksi</span>
          </a>
          <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
            <div class="w-5 h-5 bg-gray-200 rounded"><img src="image/dashboard.png" alt=""></div><span>Data Monitoring</span>
          </a>
          <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
            <div class="w-5 h-5 bg-gray-200 rounded"><img src="image/dashboard.png" alt=""></div><span>Data Keuangan</span>
          </a>
        </nav>
      </div>

      <!-- Bottom Section -->
      <div class="mt-6 space-y-2">
        <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
          <div class="w-5 h-5 bg-gray-200 rounded"><img src="image/dashboard.png" alt=""></div><span>Setting</span>
        </a>
        <a href="#" class="flex items-center space-x-2 text-red-600 font-bold">
          <div class="w-5 h-5 bg-gray-200 rounded"><img src="image/dashboard.png" alt=""></div><span>Logout</span>
        </a>
      </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-4 lg:p-6">
      <!-- Topbar -->
      <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
        <input type="text" placeholder="Search" class="w-full  p-2 border border-gray-300 rounded-full" />
        <div class="w-8 h-8 bg-gray-200 rounded-full"><img src="image/notification.png" alt=""></div>
        <div class="h-6 w-px bg-gray-300"></div>
        <div class="flex items-center space-x-2">
          <div class="w-8 h-8 bg-gray-200 rounded-full"><img src="image/user (1).png" alt=""></div>
          <div class="text-right">
            <div class="text-blue-800 font-bold">Username</div>
            <div class="text-xs text-gray-500">Admin</div>
          </div>
        </div>
      </div>

      <div class="flex flex-wrap gap-2 items-center mb-6">
        <button class="px-4 py-2 bg-gray-200 rounded-full">All</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Verified</button>
        <button class="px-4 py-2 bg-gray-200 rounded-full">Not Verified</button>
        <button class="px-4 py-2 bg-gray-100 border rounded-full">Export PDF</button>
      </div>

      <!-- Table -->
      <div class="bg-white rounded shadow p-4 overflow-x-auto">
        <table class="w-full table-auto text-sm">
          <thead class="border-b">
            <tr class="text-left text-gray-600">
              <th class="py-2">No</th>
              <th class="py-2">Nama Tenan</th>
              <th class="py-2">Lokasi</th>
              <th class="py-2">Jenis Usaha</th>
              <th class="py-2">Status</th>
              <th class="py-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t">
              <td class="py-2">1.</td>
              <td class="py-2">Tembakau Kita</td>
              <td class="py-2">Batuan, Sumenep</td>
              <td class="py-2">Pabrik Rokok</td>
              <td class="py-2 text-green-600 font-semibold">Aktif</td>
              <td class="py-2">
                <button class="px-3 py-1 bg-green-500 text-white text-xs rounded-full">Verification</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
