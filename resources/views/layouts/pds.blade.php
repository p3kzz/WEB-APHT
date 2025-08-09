<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard APHT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .nav-link-active {
            color: #10B981;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden" onclick="closeSidebar()">
    </div>

    <div class="flex flex-col lg:flex-row min-h-screen">
        <aside id="sidebar"
            class="w-64 bg-white shadow-lg h-screen p-4 flex flex-col justify-between
            fixed top-0 left-0 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out
            lg:translate-x-0 lg:relative lg:flex-shrink-0 rounded-lg">
            <div>
                <img src="{{ asset('assets/img/Group 44.png') }}" class="mb-12 h-20 mx-auto" alt="Logo APHT">

                <nav class="space-y-2 lg:space-y-4">
                    <a
                        href="{{ route('admin_apht.index.index') }}"class="flex items-center space-x-3 p-2 rounded-lg font-semibold transition-colors duration-200
                    {{ request()->routeIs('admin_apht.dataLaporan.index') ? 'bg-green-100 text-green-600' : 'text-gray-800 hover:bg-green-100 hover:text-green-600' }}">
                        <div class="w-5 h-5 flex items-center justify-center"><img
                                src="{{ asset('assets/img/dashboard.png') }}" alt="Dashboard Icon"
                                class="w-full h-full object-contain"></div>
                        <span>Dashboard</span>
                    </a>
                    <a href="datapengajuanpds"
                        class="flex items-center space-x-3 p-2 rounded-lg text-gray-800 hover:bg-green-100 hover:text-green-600 font-semibold transition-colors duration-200">
                        <div class="w-5 h-5 flex items-center justify-center"><img
                                src="{{ asset('assets/img/upload-file.png') }}" alt="Dashboard Icon"
                                class="w-full h-full object-contain"></div>
                        <span>Data Pengajuan PDs</span>
                    </a>

                    <div class="relative">
                        <button type="button"
                            class="flex items-center space-x-3 p-2 rounded-lg text-gray-800 hover:bg-green-100 hover:text-green-600 font-semibold w-full text-left transition-colors duration-200"
                            onclick="toggleDropdown('laporanDropdown')">
                            <div class="w-5 h-5 flex items-center justify-center"><img
                                    src="{{ asset('assets/img/report.png') }}" alt="Pengajuan Icon"
                                    class="w-full h-full object-contain"></div>
                            <span>Laporan</span>
                            <svg class="ml-auto w-4 h-4 transform transition-transform duration-200"
                                id="pengajuanDropdownIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="laporanDropdown" class="hidden pl-8 mt-1 space-y-2">
                            <a href="dataproduksi"
                                class="flex items-center space-x-3 p-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-500 transition-colors duration-200">
                                <span>Laporan Produksi</span>
                            </a>
                            <a href="datakeuangan"
                                class="flex items-center space-x-3 p-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-500 transition-colors duration-200">
                                <span>Laporan Keuangan</span>
                            </a>
                            <a href="{{ route('admin_apht.dataLaporan.index') }}"
                                class="flex items-center space-x-3 p-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-500 transition-colors duration-200">
                                <span>Data Laporan</span>
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('admin_apht.datamonitoring.index') }}"
                        class="flex items-center space-x-3 p-2 rounded-lg text-gray-800 hover:bg-green-100 hover:text-green-600 font-semibold transition-colors duration-200">
                        <div class="w-5 h-5 flex items-center justify-center"><img
                                src="{{ asset('assets/img/monitoring-system.png') }}" alt="Data Monitoring Icon"
                                class="w-full h-full object-contain"></div>
                        <span>Data Monitoring</span>
                    </a>

                </nav>
            </div>

            <div class="border-t border-gray-200 my-4"></div>

            <div class="space-y-2">
                <a href="#"
                    class="flex items-center space-x-3 p-2 rounded-lg text-gray-800 hover:bg-gray-100 hover:text-gray-900 font-semibold transition-colors duration-200">
                    <div class="w-5 h-5 flex items-center justify-center"><img
                            src="{{ asset('assets/img/settings.png') }}" alt="Setting Icon"
                            class="w-full h-full object-contain"></div>
                    <span>Setting</span>
                </a>
                <a href="/logout"
                    class="flex items-center space-x-3 p-2 rounded-lg text-red-600 hover:bg-red-50 hover:text-red-700 font-bold transition-colors duration-200">
                    <div class="w-5 h-5 flex items-center justify-center"><img
                            src="{{ asset('assets/img/logout.png') }}" alt="Logout Icon"
                            class="w-full h-full object-contain"></div>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="flex-1 p-4 lg:p-6 transition-all duration-300 ease-in-out">
            <header class="bg-white shadow p-4 mb-4 flex justify-between items-center lg:hidden rounded-lg">
                <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
                <button id="open-sidebar-btn" class="text-gray-800 focus:outline-none" onclick="openSidebar()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </header>

            <div class="flex flex-row flex-wrap items-center justify-between gap-4 mb-4 px-4">
                <input type="text" placeholder="Search" id="searchInput"
                    class="flex-1 min-w-[150px]  p-2 px-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                    onkeyup="filterTable()" />

                <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                    <img src="{{ asset('assets/img/notification.png') }}" alt=""
                        class="w-5 h-5 object-contain" />
                </div>

                <div class="w-px h-6 bg-gray-300 hidden md:block"></div>

                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
                        <img src="{{ asset('assets/img/user.png') }}" alt="User"
                            class="object-cover w-full h-full" />
                    </div>
                    <div class="hidden md:flex flex-col text-left">
                        <div class="text-blue-800 font-bold text-sm">Username</div>
                        <div class="text-xs text-gray-500">Admin</div>
                    </div>
                </div>

            </div>
            @yield('contentPds')
        </main>
    </div>

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const icon = document.getElementById(id + 'Icon');

            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        function openSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        window.filterTable = function() {
            const searchInput = document.getElementById('searchInput');
            const filter = searchInput.value.toLowerCase();

            const tables = document.querySelectorAll('main table:not(.hidden)');

            tables.forEach(table => {
                const tbody = table.querySelector('tbody');
                if (!tbody) return;

                const rows = tbody.getElementsByTagName('tr');

                for (let i = 0; i < rows.length; i++) {
                    let displayRow = false;
                    const cells = rows[i].getElementsByTagName('td');
                    for (let j = 0; j < cells.length; j++) {
                        const cell = cells[j];
                        if (cell) {
                            const textValue = cell.textContent || cell.innerText;
                            if (textValue.toLowerCase().includes(filter)) {
                                displayRow = true;
                                break;
                            }
                        }
                    }
                    rows[i].style.display = displayRow ? '' : 'none';
                }
            });
        }

        window.addEventListener('resize', () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
            } else {
                if (!sidebar.classList.contains('-translate-x-full') && !overlay.classList.contains('hidden')) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        });
    </script>
</body>

</html>
