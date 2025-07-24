<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard APHT</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100 font-sans">
    <div class="flex flex-col lg:flex-row ">
        <aside class="w-full lg:w-64 bg-white shadow h-auto lg:h-screen p-4 flex flex-col justify-between
        lg:fixed lg:top-0 lg:left-0 lg:bottom-0 z-50">
            <div>
                <img src="{{ asset('assets/img/Group 44.png') }}"  class="mb-12 h-20" alt="">

                <nav class="space-y-2 lg:space-y-4">
                    <a href="#"
                        class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
                        <div class="w-5 h-5 bg-white-200 rounded"><img src="{{ asset('assets/img/dashboard.png') }}" alt=""></div>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
                        <div class="w-5 h-5 bg-white-200 rounded"><img src="{{ asset('assets/img/business-and-trade.png') }}" alt=""></div>
                        <span>Data Unit Usaha</span>
                    </a>
                    <a href="#"
                        class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
                        <div class="w-5 h-5 bg-white-200 rounded"><img src="{{ asset('assets/img/report.png') }}" alt=""></div>
                        <span>Data Laporan</span>
                    </a>
                    <a href="#"
                        class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
                        <div class="w-5 h-5 bg-white-200 rounded"><img src="{{ asset('assets/img/upload-file.png') }}" alt=""></div>
                        <span>Data Pengajuan</span>
                    </a>
                    <a href="#"
                        class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
                        <div class="w-5 h-5 bg-white-200 rounded"><img src="{{ asset('assets/img/product.png') }}" alt=""></div>
                        <span>Data Produksi</span>
                    </a>
                    <a href="#"
                        class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
                        <div class="w-5 h-5 bg-white-200 rounded"><img src="{{ asset('assets/img/monitoring-system.png') }}" alt=""></div>
                        <span>Data Monitoring</span>
                    </a>
                    <a href="#"
                        class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
                        <div class="w-5 h-5 bg-white-200 rounded"><img src="{{ asset('assets/img/diagram.png') }}" alt=""></div>
                        <span>Data Keuangan</span>
                    </a>
                </nav>
            </div>


            <div class="border-t border-gray-200 my-4"></div>


            <div class="space-y-2">
                <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 font-semibold">
                    <div class="w-5 h-5 bg-white-200 rounded"><img src="{{ asset('assets/img/settings.png') }}" alt=""></div>
                    <span>Setting</span>
                </a>
                <a href="#" class="flex items-center space-x-2 text-red-600 font-bold">
                    <div class="w-5 h-5 bg-white-200 rounded"><img src="{{ asset('assets/img/logout.png') }}" alt=""></div>
                    <span>Logout</span>
                </a>
            </div>
        </aside>



        <main class="flex-1 p-4 lg:p-6 lg:ml-64">
            @yield('content')

        </main>
    </div>
</body>

</html>
