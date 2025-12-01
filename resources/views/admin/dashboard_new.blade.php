<x-dashboard-layout>
<div class="flex min-h-screen bg-blue-100 dark:bg-gray-900">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col">
        <!-- Logo -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <x-application-logo class="w-10 h-10 text-blue-600" />
                <div>
                    <h2 class="font-bold text-gray-900 dark:text-white">SIM-TIK</h2>
                    <p class="text-xs text-gray-500">Admin</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-3 py-4 space-y-2 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 rounded-lg transition">
                <span class="text-lg">🏠</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.asset-requests.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">📋</span>
                <span>Pengajuan Aset</span>
            </a>
            <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">🏷️</span>
                <span>Kategori</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">👥</span>
                <span>User</span>
            </a>
            <a href="{{ route('tickets.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">🎫</span>
                <span>Tiket</span>
            </a>
        </nav>

        <!-- User Profile -->
        <div class="p-3 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3 px-4 py-2">
                <div class="w-9 h-9 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">Admin</p>
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
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard Admin</h1>
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
            <div class="p-8 space-y-8 max-w-6xl mx-auto">
                <!-- WELCOME SECTION -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Selamat Datang Kembali</h2>
                    <p class="text-gray-600 dark:text-gray-400">Berikut ringkasan singkat aktivitas sistem Anda</p>
                </div>

                <!-- MAIN GRID LAYOUT -->
                <div class="grid lg:grid-cols-[minmax(0,2fr)_minmax(0,1.2fr)] gap-6 items-start">
                    <!-- LEFT COLUMN: MAIN STATS & QUICK ACTIONS -->
                    <div class="space-y-6">
                        <!-- STATISTICS CARDS - SIMPLIFIED -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Total Pengajuan Aset -->
                            <a href="{{ route('admin.asset-requests.index') }}" class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md hover:-translate-y-0.5 transition flex flex-col">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-gray-600 dark:text-gray-400 text-xs font-medium tracking-wide uppercase">Total Pengajuan</p>
                                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-1.5">{{ $totalPengajuan ?? 0 }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">Menunggu persetujuan</p>
                                    </div>
                                    <span class="text-4xl">�</span>
                                </div>
                            </a>

                            <!-- Total Tiket -->
                            <a href="{{ route('tickets.index') }}" class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md hover:-translate-y-0.5 transition flex flex-col">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="text-gray-600 dark:text-gray-400 text-xs font-medium tracking-wide uppercase">Total Tiket</p>
                                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white mt-1.5">{{ $totalTiket ?? 0 }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">Seluruh laporan</p>
                                    </div>
                                    <span class="text-4xl">🎫</span>
                                </div>
                            </a>
                        </div>

                        <!-- QUICK ACTIONS -->
                        <div class="space-y-3">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white tracking-wide uppercase">Aksi Cepat</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5">
                                <!-- View Asset Requests -->
                                <a href="{{ route('admin.asset-requests.index') }}" class="bg-blue-500/10 dark:bg-blue-900/20 border border-blue-300 dark:border-blue-900/40 rounded-xl p-4 hover:bg-blue-500/20 dark:hover:bg-blue-900/30 transition">
                                    <h3 class="text-xs font-semibold text-blue-900 dark:text-blue-100 mb-1 flex items-center gap-1">� <span>Review Pengajuan</span></h3>
                                    <p class="text-xs text-blue-700 dark:text-blue-300">Setujui atau tolak pengajuan aset</p>
                                </a>

                                <!-- View All Tickets -->
                                <a href="{{ route('tickets.index') }}" class="bg-blue-100 dark:bg-blue-900/10 border border-blue-300 dark:border-blue-900/40 rounded-xl p-4 hover:bg-blue-200 dark:hover:bg-blue-900/20 transition">
                                    <h3 class="text-xs font-semibold text-blue-900 dark:text-blue-100 mb-1 flex items-center gap-1">🎫 <span>Lihat Tiket</span></h3>
                                    <p class="text-xs text-blue-700 dark:text-blue-300">Kelola seluruh laporan tiket</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: STATUS OVERVIEW -->
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white tracking-wide uppercase">Status Tiket</h3>
                        <div class="space-y-2.5">
                            <!-- Pending -->
                            <div class="bg-yellow-50 dark:bg-yellow-900/10 border border-yellow-200 dark:border-yellow-900/30 rounded-xl p-3">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-xl">⏳</span>
                                        <p class="text-yellow-700 dark:text-yellow-400 text-[11px] font-medium">Tertunda</p>
                                    </div>
                                    <h4 class="text-lg font-semibold text-yellow-600 dark:text-yellow-500">{{ $pendingTiket ?? 0 }}</h4>
                                </div>
                            </div>

                            <!-- Processing -->
                            <div class="bg-blue-50 dark:bg-blue-900/10 border border-blue-200 dark:border-blue-900/30 rounded-xl p-3">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-xl">⚙️</span>
                                        <p class="text-blue-700 dark:text-blue-400 text-[11px] font-medium">Diproses</p>
                                    </div>
                                    <h4 class="text-lg font-semibold text-blue-600 dark:text-blue-500">{{ $processingTiket ?? 0 }}</h4>
                                </div>
                            </div>

                            <!-- Done -->
                            <div class="bg-green-50 dark:bg-green-900/10 border border-green-200 dark:border-green-900/30 rounded-xl p-3">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-xl">✅</span>
                                        <p class="text-green-700 dark:text-green-400 text-[11px] font-medium">Selesai</p>
                                    </div>
                                    <h4 class="text-lg font-semibold text-green-600 dark:text-green-500">{{ $doneTiket ?? 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</x-dashboard-layout>
