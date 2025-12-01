<style>
    /* CYBER ANIMATIONS */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-60px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    @keyframes pulse-subtle {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    @keyframes glow-pulse { 
        0%, 100% { opacity: 1; } 
        50% { opacity: 0.8; } 
    }
    @keyframes data-flow { 
        0% { transform: translateX(-100%); } 
        100% { transform: translateX(100%); } 
    }

    .header-section { animation: fadeInDown 0.8s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .stat-card { animation: fadeInUp 0.6s ease-out forwards; overflow: hidden; position: relative; }
    .stat-card::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 2px; background: linear-gradient(90deg, transparent, rgba(245, 158, 11, 0.8), transparent); animation: data-flow 2s infinite; }
    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }
    .action-card { animation: slideInLeft 0.7s ease-out forwards; }
    .action-card:nth-child(1) { animation-delay: 0.5s; }
    .action-card:nth-child(2) { animation-delay: 0.6s; }
    .action-card:nth-child(3) { animation-delay: 0.7s; }
    .icon-animate { animation: float 3s ease-in-out infinite; transition: all 0.3s ease; }
    .group:hover .icon-animate { animation: float 1.5s ease-in-out infinite; }
    .status-dot { animation: pulse-subtle 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
    .gradient-title { background: linear-gradient(135deg, #f59e0b 0%, #dc2626 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .section-underline { position: relative; padding-bottom: 0.5rem; }
    .section-underline::after { content: ''; position: absolute; bottom: 0; left: 0; width: 60px; height: 4px; background: linear-gradient(90deg, #f59e0b 0%, #dc2626 100%); border-radius: 9999px; animation: glow-pulse 2s ease-in-out infinite; }
    .stat-value { font-size: 2.75rem; font-weight: 900; letter-spacing: -0.02em; }
    .card-base { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid rgba(229, 231, 235, 0.5); }
    .card-base:hover { transform: translateY(-8px); }
    .dark .card-base:hover { }
</style>

<x-app-layout>
    <x-slot name="header">
        <div class="header-section">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-4xl sm:text-5xl font-black gradient-title leading-tight">
                        🔧 Teknisi Dashboard
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-3 font-medium">
                        Selamat datang, {{ auth()->user()->name }}! Kelola dan tangani tiket perbaikan
                    </p>
                </div>
                <div class="flex items-center gap-6 text-sm">
                    <div class="text-right">
                        <p class="text-gray-900 dark:text-gray-100 font-bold text-lg">{{ date('d F Y') }}</p>
                        <p class="text-gray-500 dark:text-gray-500 text-xs mt-1">{{ date('H:i') }} WIB</p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-50 to-orange-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                <!-- STATISTIK TUGAS SAYA -->
                <section class="mb-16">
                    <div class="section-underline mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                            <span class="text-4xl">📊</span>
                            Tugas Saya Hari Ini
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Total Tiket Ditugaskan -->
                        <div class="stat-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-400 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 mb-4">
                                            Total
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Tiket Ditugaskan</p>
                                        <div class="stat-value text-blue-600 dark:text-blue-500">
                                            {{ $totalTugas ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300 icon-animate">
                                        📋
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-500">
                                    <span class="inline-block w-2 h-2 bg-green-500 rounded-full status-dot"></span>
                                    Semua tugas
                                </div>
                            </div>
                        </div>

                        <!-- Pending Tiket -->
                        <div class="stat-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-amber-600 to-amber-400 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 mb-4">
                                            Menunggu
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Pending/Belum Dimulai</p>
                                        <div class="stat-value text-amber-600 dark:text-amber-500">
                                            {{ $pendingTugas ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300 icon-animate">
                                        ⏳
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-500">
                                    <span class="inline-block w-2 h-2 bg-yellow-500 rounded-full status-dot"></span>
                                    Butuh perhatian
                                </div>
                            </div>
                        </div>

                        <!-- Processing Tiket -->
                        <div class="stat-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-600 to-orange-400 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 mb-4">
                                            Diproses
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Sedang Dikerjakan</p>
                                        <div class="stat-value text-orange-600 dark:text-orange-500">
                                            {{ $processingTugas ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300 icon-animate">
                                        🔧
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-500">
                                    <span class="inline-block w-2 h-2 bg-orange-500 rounded-full status-dot"></span>
                                    Dalam perbaikan
                                </div>
                            </div>
                        </div>

                        <!-- Done Tiket -->
                        <div class="stat-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-600 to-emerald-400 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 mb-4">
                                            Selesai
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Perbaikan Selesai</p>
                                        <div class="stat-value text-emerald-600 dark:text-emerald-500">
                                            {{ $doneTugas ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300 icon-animate">
                                        ✅
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-500">
                                    <span class="inline-block w-2 h-2 bg-green-500 rounded-full status-dot"></span>
                                    Selesai dikerjakan
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- MENU UTAMA -->
                <section class="mb-16">
                    <div class="section-underline mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                            <span class="text-4xl">⚡</span>
                            Menu Utama
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Lihat Tiket -->
                        <a href="{{ route('tickets.index') }}" class="action-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-10 card-base border-2 border-gray-200 dark:border-gray-700 group-hover:border-blue-500 dark:group-hover:border-blue-500">
                                <div class="flex justify-between items-start mb-8">
                                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Lihat Semua Tiket</h3>
                                    <span class="text-6xl group-hover:scale-125 transition-transform duration-300 icon-animate">📋</span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-8">
                                    Lihat daftar lengkap tiket yang ditugaskan dan kelola status perbaikan
                                </p>
                                <div class="flex items-center gap-3 text-blue-600 dark:text-blue-400 font-semibold group-hover:gap-4 transition-all">
                                    <span>Buka Tiket</span>
                                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <!-- Tiket Pending -->
                        <a href="{{ route('tickets.index') }}?status=Pending" class="action-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-10 card-base border-2 border-gray-200 dark:border-gray-700 group-hover:border-amber-500 dark:group-hover:border-amber-500">
                                <div class="flex justify-between items-start mb-8">
                                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Tiket Pending</h3>
                                    <span class="text-6xl group-hover:scale-125 transition-transform duration-300 icon-animate">⏳</span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-8">
                                    Tiket yang belum dimulai dan butuh perhatian Anda segera
                                </p>
                                <div class="flex items-center gap-3 text-amber-600 dark:text-amber-400 font-semibold group-hover:gap-4 transition-all">
                                    <span>Lihat Pending</span>
                                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <!-- Update Progres -->
                        <a href="{{ route('tickets.index') }}?status=Processing" class="action-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-10 card-base border-2 border-gray-200 dark:border-gray-700 group-hover:border-orange-500 dark:group-hover:border-orange-500">
                                <div class="flex justify-between items-start mb-8">
                                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Sedang Dikerjakan</h3>
                                    <span class="text-6xl group-hover:scale-125 transition-transform duration-300 icon-animate">🔧</span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-8">
                                    Tiket yang sedang diproses dan perlu update progress kerja
                                </p>
                                <div class="flex items-center gap-3 text-orange-600 dark:text-orange-400 font-semibold group-hover:gap-4 transition-all">
                                    <span>Lihat Progress</span>
                                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </section>

                <!-- TIPS & INFO -->
                <section class="mb-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Tips Banner -->
                        <div class="bg-gradient-to-r from-orange-50 to-red-50 dark:from-orange-900/10 dark:to-red-900/10 border-l-4 border-orange-500 rounded-2xl p-8 card-base">
                            <div class="flex gap-4">
                                <span class="text-3xl flex-shrink-0">💡</span>
                                <div>
                                    <h3 class="font-bold text-gray-900 dark:text-white mb-2">Tips Perbaikan</h3>
                                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                        <li>✓ Prioritaskan tiket pending terlebih dahulu</li>
                                        <li>✓ Update status tiket secara berkala</li>
                                        <li>✓ Berikan catatan detail untuk setiap progres</li>
                                        <li>✓ Konfirmasi ketika perbaikan selesai</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Performance Banner -->
                        <div class="bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/10 dark:to-green-900/10 border-l-4 border-emerald-500 rounded-2xl p-8 card-base">
                            <div class="flex gap-4">
                                <span class="text-3xl flex-shrink-0">📈</span>
                                <div>
                                    <h3 class="font-bold text-gray-900 dark:text-white mb-2">Performa Anda</h3>
                                    <div class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                                        <div class="flex justify-between">
                                            <span>Tingkat Penyelesaian:</span>
                                            <strong class="text-emerald-600 dark:text-emerald-400">
                                                @if($totalTugas > 0)
                                                    {{ round(($doneTugas / $totalTugas) * 100) }}%
                                                @else
                                                    0%
                                                @endif
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
