<x-dashboard-layout>
<div class="flex min-h-screen bg-blue-100/60 dark:bg-gray-900">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col">
        <!-- Logo -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <x-application-logo class="w-10 h-10 text-orange-600" />
                <div>
                    <h2 class="font-bold text-gray-900 dark:text-white">SIM-TIK</h2>
                    <p class="text-xs text-gray-500">Teknisi</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-3 py-4 space-y-2 overflow-y-auto">
            <a href="#" class="flex items-center gap-3 px-4 py-2.5 bg-orange-50 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 rounded-lg font-medium border-l-4 border-orange-600 transition">
                <span class="text-lg">📊</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('tickets.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">📋</span>
                <span>Semua Tiket</span>
            </a>
            <a href="{{ route('tickets.index') }}?status=Pending" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">⏳</span>
                <span>Tiket Pending</span>
            </a>
            <a href="{{ route('tickets.index') }}?status=Processing" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">🔧</span>
                <span>Sedang Dikerjakan</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">⚙️</span>
                <span>Pengaturan</span>
            </a>
        </nav>

        <!-- User Profile -->
        <div class="p-3 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3 px-4 py-2">
                <div class="w-9 h-9 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white text-sm font-bold">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">Teknisi</p>
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
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard Teknisi</h1>
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
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Dashboard Teknisi</h2>
                    <p class="text-gray-600 dark:text-gray-400">Kelola tugas dan tiket perbaikan Anda</p>
                </div>

                <!-- MAIN STATS -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Total Tugas -->
                    <div class="bg-orange-50 dark:bg-orange-900/10 border border-orange-200 dark:border-orange-900/30 rounded-lg p-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-orange-700 dark:text-orange-400 text-sm font-medium">Total Tugas</p>
                                <h3 class="text-5xl font-bold text-orange-600 dark:text-orange-500 mt-3">{{ $totalTugas ?? 0 }}</h3>
                                <p class="text-sm text-orange-600 dark:text-orange-400 mt-3">Tiket yang ditugaskan</p>
                            </div>
                            <span class="text-6xl">📋</span>
                        </div>
                    </div>

                    <!-- Status Overview -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-8">
                        <h4 class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-4">Ringkasan Tugas</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300 flex items-center gap-2">
                                    <span>⏳</span> Pending
                                </span>
                                <span class="text-2xl font-bold text-yellow-600 dark:text-yellow-500">{{ $pendingTugas ?? 0 }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300 flex items-center gap-2">
                                    <span>🔧</span> Diproses
                                </span>
                                <span class="text-2xl font-bold text-orange-600 dark:text-orange-500">{{ $processingTugas ?? 0 }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-300 flex items-center gap-2">
                                    <span>✅</span> Selesai
                                </span>
                                <span class="text-2xl font-bold text-green-600 dark:text-green-500">{{ $doneTugas ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- QUICK ACTIONS -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Lihat Tiket</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- All Tickets -->
                        <a href="{{ route('tickets.index') }}" class="bg-blue-50 dark:bg-blue-900/10 border border-blue-200 dark:border-blue-900/30 rounded-lg p-6 hover:bg-blue-100 dark:hover:bg-blue-900/20 transition">
                            <div class="text-3xl mb-3">📋</div>
                            <h4 class="font-semibold text-blue-900 dark:text-blue-100 mb-1">Semua Tiket</h4>
                            <p class="text-sm text-blue-700 dark:text-blue-300">Daftar semua tiket yang ditugaskan</p>
                        </a>

                        <!-- Pending Tickets -->
                        <a href="{{ route('tickets.index') }}?status=Pending" class="bg-yellow-50 dark:bg-yellow-900/10 border border-yellow-200 dark:border-yellow-900/30 rounded-lg p-6 hover:bg-yellow-100 dark:hover:bg-yellow-900/20 transition">
                            <div class="text-3xl mb-3">⏳</div>
                            <h4 class="font-semibold text-yellow-900 dark:text-yellow-100 mb-1">Pending</h4>
                            <p class="text-sm text-yellow-700 dark:text-yellow-300">Tiket menunggu untuk dikerjakan</p>
                        </a>

                        <!-- Processing Tickets -->
                        <a href="{{ route('tickets.index') }}?status=Processing" class="bg-orange-50 dark:bg-orange-900/10 border border-orange-200 dark:border-orange-900/30 rounded-lg p-6 hover:bg-orange-100 dark:hover:bg-orange-900/20 transition">
                            <div class="text-3xl mb-3">🔧</div>
                            <h4 class="font-semibold text-orange-900 dark:text-orange-100 mb-1">Diproses</h4>
                            <p class="text-sm text-orange-700 dark:text-orange-300">Tiket sedang dalam proses perbaikan</p>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</x-dashboard-layout>
