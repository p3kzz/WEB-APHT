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
                    <a href="tenant"
                        class="flex items-center space-x-3 p-2 rounded-lg text-gray-800 hover:bg-green-100 hover:text-green-600 font-semibold transition-colors duration-200">
                        <div class="w-5 h-5 flex items-center justify-center"><img
                                src="{{ asset('assets/img/dashboard.png') }}" alt="Dashboard Icon"
                                class="w-full h-full object-contain"></div>
                        <span>Dashboard</span>
                    </a>

                    {{-- <a href="/DataUnitUsaha"
                        class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
                        <div class="w-5 h-5 bg-white-200 rounded"><img
                                src="{{ asset('assets/img/business-and-trade.png') }}" alt=""></div>
                        <span>Data Unit Usaha</span>
                    </a> --}}

                    <div class="relative">
                        <button type="button"
                            class="flex items-center space-x-3 p-2 rounded-lg text-gray-800 hover:bg-green-100 hover:text-green-600 font-semibold w-full text-left transition-colors duration-200"
                            onclick="toggleDropdown('pengajuanDropdown')">
                            <div class="w-5 h-5 flex items-center justify-center"><img
                                    src="{{ asset('assets/img/upload-file.png') }}" alt="Pengajuan Icon"
                                    class="w-full h-full object-contain"></div>
                            <span>Pengajuan</span>
                            <svg class="ml-auto w-4 h-4 transform transition-transform duration-200"
                                id="pengajuanDropdownIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="pengajuanDropdown" class="hidden pl-8 mt-1 space-y-2">
                            <a href="dataUsaha"
                                class="flex items-center space-x-3 p-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-500 transition-colors duration-200">
                                <span>Buat Pengajuan</span>
                            </a>
                            <a href="dataPengajuan"
                                class="flex items-center space-x-3 p-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-500 transition-colors duration-200">
                                <span>Data Pengajuan</span>
                            </a>
                        </div>
                    </div>

                    @php
                        use Illuminate\Support\Facades\Auth;
                        $hasApprovedPengajuan = false;
                        if (Auth::check() && Auth::user()->tenant) {
                            $hasApprovedPengajuan = Auth::user()
                                ->tenant->pengajuan()
                                ->where('status', 'disetujui')
                                ->exists();
                        }
                    @endphp

                    <div class="relative">

                        @if ($hasApprovedPengajuan)
                            <button type="button"
                                class="flex items-center space-x-3 p-2 rounded-lg text-gray-800 hover:bg-green-100 hover:text-green-600 font-semibold w-full text-left transition-colors duration-200"
                                onclick="toggleDropdown('laporanDropdown')">
                                <div class="w-5 h-5 flex items-center justify-center"><img
                                        src="{{ asset('assets/img/report.png') }}" alt="Laporan Icon"
                                        class="w-full h-full object-contain"></div>
                                <span>Laporan</span>
                                <svg class="ml-auto w-4 h-4 transform transition-transform duration-200"
                                    id="laporanDropdownIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="laporanDropdown" class="hidden pl-8 mt-1 space-y-2">
                                <a href="laporanproduksi"
                                    class="flex items-center space-x-3 p-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-500 transition-colors duration-200">
                                    <span>Laporan Produksi</span>
                                </a>
                                <a href="laporankeuangan"
                                    class="flex items-center space-x-3 p-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-500 transition-colors duration-200">
                                    <span>Laporan Keuangan</span>
                                </a>
                                <a href="datalaporan"
                                    class="flex items-center space-x-3 p-2 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-500 transition-colors duration-200">
                                    <span>Data Laporan</span>
                                </a>
                            </div>
                        @else
                            <span
                                class="flex items-center space-x-3 p-2 rounded-lg text-gray-400 font-semibold cursor-not-allowed"
                                title="Anda perlu memiliki pengajuan yang disetujui untuk mengakses laporan.">
                                <div class="w-5 h-5 flex items-center justify-center"><img
                                        src="{{ asset('assets/img/report.png') }}" alt="Laporan Icon"
                                        class="w-full h-full object-contain opacity-50"></div>
                                <span>Laporan</span>
                                <svg class="ml-auto w-4 h-4 transform transition-transform duration-200"
                                    id="laporanDropdownIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                        @endif

                    </div>

                    <!-- Data Monitoring Link -->
                    <a href="monitoring"
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

            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.toggleDropdown = function(id) {
                const dropdown = document.getElementById(id);
                const icon = document.getElementById(id + 'Icon');

                if (dropdown && icon) {
                    dropdown.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                }
            };

            window.openSidebar = function() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                if (sidebar && overlay) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                }
            };

            window.closeSidebar = function() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                if (sidebar && overlay) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            };

            window.addEventListener('resize', () => {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                if (sidebar && overlay) {
                    if (window.innerWidth >= 1024) {
                        sidebar.classList.remove('-translate-x-full');
                        overlay.classList.add('hidden');
                    } else {
                        if (!sidebar.classList.contains('-translate-x-full') && !overlay.classList.contains(
                                'hidden')) {
                            sidebar.classList.add('-translate-x-full');
                            overlay.classList.add('hidden');
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
