<x-dashboard-layout>
<div class="flex min-h-screen bg-blue-100 dark:bg-gray-900">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col">
        <!-- Logo -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <x-application-logo class="w-10 h-10 text-green-600" />
                <div>
                    <h2 class="font-bold text-gray-900 dark:text-white">SIM-TIK</h2>
                    <p class="text-xs text-gray-500">User</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-3 py-4 space-y-2 overflow-y-auto">
            <a href="#" class="flex items-center gap-3 px-4 py-2.5 bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 rounded-lg font-medium border-l-4 border-green-600 transition">
                <span class="text-lg">📊</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('asset-requests.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">📦</span>
                <span>Ajukan Aset</span>
            </a>
            <a href="{{ route('asset-requests.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">📋</span>
                <span>Pengajuan Saya</span>
            </a>
            <a href="{{ route('tickets.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">➕</span>
                <span>Lapor Masalah</span>
            </a>
            <a href="{{ route('tickets.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">🎫</span>
                <span>Laporan Saya</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">⚙️</span>
                <span>Pengaturan</span>
            </a>
        </nav>

        <!-- User Profile -->
        <div class="p-3 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3 px-4 py-2">
                <div class="w-9 h-9 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">User</p>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-red-600 transition" title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- HEADER -->
        <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard User</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Selamat datang, {{ auth()->user()->name }}!</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ date('d F Y') }}</p>
                        <p class="text-xs text-gray-500">{{ date('H:i') }} WIB</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT AREA -->
        <main class="flex-1 overflow-auto">
            <div class="p-8 space-y-8 max-w-5xl mx-auto">
                <!-- WELCOME SECTION -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Halo, {{ auth()->user()->name }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">Pantau status laporan Anda di sini</p>
                </div>

                <!-- MAIN STATS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Laporan -->
                    <div class="bg-green-50 dark:bg-green-900/10 border border-green-200 dark:border-green-900/30 rounded-lg p-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-green-700 dark:text-green-400 text-sm font-medium">Total Laporan</p>
                                <h3 class="text-5xl font-bold text-green-600 dark:text-green-500 mt-3">{{ $totalLaporan ?? 0 }}</h3>
                                <p class="text-sm text-green-600 dark:text-green-400 mt-3">Laporan yang sudah dibuat</p>
                            </div>
                            <span class="text-6xl">📋</span>
                        </div>
                    </div>

                    <!-- Total Pengajuan Aset -->
                    <div class="bg-blue-50 dark:bg-blue-900/10 border border-blue-200 dark:border-blue-900/30 rounded-lg p-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-blue-700 dark:text-blue-400 text-sm font-medium">Pengajuan Aset</p>
                                <h3 class="text-5xl font-bold text-blue-600 dark:text-blue-500 mt-3">{{ $totalPengajuanAset ?? 0 }}</h3>
                                <p class="text-sm text-blue-600 dark:text-blue-400 mt-3">Aset yang diajukan</p>
                            </div>
                            <span class="text-6xl">📦</span>
                        </div>
                    </div>

                    <!-- Status Overview -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-8">
                        <h4 class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-4">Ringkasan Status</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300">Tertunda</span>
                                <span class="text-2xl font-bold text-yellow-600 dark:text-yellow-500">{{ $pendingLaporan ?? 0 }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300">Diproses</span>
                                <span class="text-2xl font-bold text-blue-600 dark:text-blue-500">{{ $processingLaporan ?? 0 }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300">Selesai</span>
                                <span class="text-2xl font-bold text-green-600 dark:text-green-500">{{ $doneLaporan ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Create Asset Request -->
                    <a href="{{ route('asset-requests.create') }}" class="bg-blue-50 dark:bg-blue-900/10 border border-blue-200 dark:border-blue-900/30 rounded-lg p-8 hover:bg-blue-100 dark:hover:bg-blue-900/20 transition">
                        <div class="text-4xl mb-4">📦</div>
                        <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-2">Ajukan Aset Baru</h3>
                        <p class="text-blue-700 dark:text-blue-300">Ajukan perangkat TIK baru</p>
                    </a>

                    <!-- View Asset Requests -->
                    <a href="{{ route('asset-requests.index') }}" class="bg-purple-50 dark:bg-purple-900/10 border border-purple-200 dark:border-purple-900/30 rounded-lg p-8 hover:bg-purple-100 dark:hover:bg-purple-900/20 transition">
                        <div class="text-4xl mb-4">📋</div>
                        <h3 class="text-xl font-bold text-purple-900 dark:text-purple-100 mb-2">Lihat Pengajuan</h3>
                        <p class="text-purple-700 dark:text-purple-300">Pantau status pengajuan aset</p>
                    </a>

                    <!-- Create Report -->
                    <a href="{{ route('tickets.create') }}" class="bg-green-50 dark:bg-green-900/10 border border-green-200 dark:border-green-900/30 rounded-lg p-8 hover:bg-green-100 dark:hover:bg-green-900/20 transition">
                        <div class="text-4xl mb-4">➕</div>
                        <h3 class="text-xl font-bold text-green-900 dark:text-green-100 mb-2">Buat Laporan Baru</h3>
                        <p class="text-green-700 dark:text-green-300">Laporkan masalah atau kerusakan</p>
                    </a>
            </div>
        </main>
    </div>
</div>
</x-dashboard-layout>
