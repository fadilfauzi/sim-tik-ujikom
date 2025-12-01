<style>
    /* CYBER ANIMATIONS */
    @keyframes fadeInDown { from { opacity: 0; transform: translateY(-40px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes slideInLeft { from { opacity: 0; transform: translateX(-60px); } to { opacity: 1; transform: translateX(0); } }
    @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
    @keyframes pulse-subtle { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
    @keyframes glow-pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.8; } }
    @keyframes cyber-scan { 0% { transform: translateY(-100%); } 100% { transform: translateY(100%); } }
    @keyframes data-flow { 0% { transform: translateX(-100%); } 100% { transform: translateX(100%); } }
    @keyframes border-glow { 0%, 100% { border-color: rgba(59, 130, 246, 0.3); } 50% { border-color: rgba(59, 130, 246, 0.8); } }
    
    .header-section { animation: fadeInDown 0.8s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .stat-card { animation: fadeInUp 0.6s ease-out forwards; overflow: hidden; position: relative; }
    .stat-card::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 2px; background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.8), transparent); animation: data-flow 2s infinite; }
    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }
    .stat-card:nth-child(5) { animation-delay: 0.5s; }
    .stat-card:nth-child(6) { animation-delay: 0.6s; }
    .action-card { animation: slideInLeft 0.7s ease-out forwards; }
    .action-card:nth-child(1) { animation-delay: 0.5s; }
    .action-card:nth-child(2) { animation-delay: 0.6s; }
    .action-card:nth-child(3) { animation-delay: 0.7s; }
    .performance-card { animation: fadeInUp 0.6s ease-out forwards; }
    .performance-card:nth-child(1) { animation-delay: 0.8s; }
    .performance-card:nth-child(2) { animation-delay: 0.9s; }
    .icon-animate { animation: float 3s ease-in-out infinite; transition: all 0.3s ease; }
    .group:hover .icon-animate { animation: float 1.5s ease-in-out infinite; }
    .status-dot { animation: pulse-subtle 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
    .gradient-title { background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .section-underline { position: relative; padding-bottom: 0.5rem; }
    .section-underline::after { content: ''; position: absolute; bottom: 0; left: 0; width: 60px; height: 4px; background: linear-gradient(90deg, #3b82f6 0%, #8b5cf6 100%); border-radius: 9999px; animation: glow-pulse 2s ease-in-out infinite; }
    .stat-value { font-size: 2.75rem; font-weight: 900; letter-spacing: -0.02em; }
    .card-base { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid rgba(229, 231, 235, 0.5); }
    .card-base:hover { transform: translateY(-8px); }
    .dark .card-base:hover { }
    .progress-bar { height: 3px; background: #e5e7eb; border-radius: 9999px; overflow: hidden; position: relative; }
    .dark .progress-bar { background: #374151; }
    .progress-fill { height: 100%; border-radius: 9999px; transition: width 1s cubic-bezier(0.34, 1.56, 0.64, 1); position: relative; }
    .progress-fill::after { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent); animation: data-flow 1.5s infinite; }
</style>

<x-app-layout>
    <x-slot name="header">
        <div class="header-section">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-4xl sm:text-5xl font-black gradient-title leading-tight">
                        ðŸ“Š Admin Dashboard
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-3 font-medium">
                        Kelola sistem TIK dengan efisiensi maksimal
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

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-50 to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                <!-- STATISTIK UTAMA -->
                <section class="mb-16">
                    <div class="section-underline mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                            <span class="text-4xl">📊</span>
                            Statistik Utama
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Total Aset -->
                        <div class="stat-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-400 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 mb-4">
                                            Total Aset
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Perangkat TIK</p>
                                        <div class="stat-value text-blue-600 dark:text-blue-500">
                                            {{ $totalAsets ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300 icon-animate">
                                        ðŸ“¦
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-500">
                                    <span class="inline-block w-2 h-2 bg-green-500 rounded-full status-dot"></span>
                                    Tercatat aktif
                                </div>
                                <div class="progress-bar mt-6">
                                    <div class="progress-fill bg-gradient-to-r from-blue-500 to-blue-600" style="width: {{ min(($totalAsets ?? 0) * 5, 100) }}%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Tiket -->
                        <div class="stat-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-400 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 mb-4">
                                            Total Laporan
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Tiket Masuk</p>
                                        <div class="stat-value text-green-600 dark:text-green-500">
                                            {{ $totalTiket ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300 icon-animate">
                                        ðŸŽ«
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-500">
                                    <span class="inline-block w-2 h-2 bg-green-500 rounded-full status-dot"></span>
                                    Semua status
                                </div>
                                <div class="progress-bar mt-6">
                                    <div class="progress-fill bg-gradient-to-r from-green-500 to-green-600" style="width: {{ min(($totalTiket ?? 0) * 8, 100) }}%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending -->
                        <div class="stat-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-amber-600 to-amber-400 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 mb-4">
                                            Menunggu
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Tiket Pending</p>
                                        <div class="stat-value text-amber-600 dark:text-amber-500">
                                            {{ $pendingTiket ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300 icon-animate">
                                        â°
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-500">
                                    <span class="inline-block w-2 h-2 bg-yellow-500 rounded-full status-dot"></span>
                                    Butuh penugasan
                                </div>
                                <div class="progress-bar mt-6">
                                    <div class="progress-fill bg-gradient-to-r from-amber-500 to-amber-600" style="width: {{ min(($pendingTiket ?? 0) * 20, 100) }}%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Processing -->
                        <div class="stat-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-600 to-purple-400 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex-1">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 mb-4">
                                            Diproses
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Sedang Dikerjakan</p>
                                        <div class="stat-value text-purple-600 dark:text-purple-500">
                                            {{ $processingTiket ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300 icon-animate">
                                        âš™ï¸
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-500">
                                    <span class="inline-block w-2 h-2 bg-purple-500 rounded-full status-dot"></span>
                                    Dalam perbaikan
                                </div>
                                <div class="progress-bar mt-6">
                                    <div class="progress-fill bg-gradient-to-r from-purple-500 to-purple-600" style="width: {{ min(($processingTiket ?? 0) * 25, 100) }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- AKSES CEPAT -->
                <section class="mb-16">
                    <div class="section-underline mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                            <span class="text-4xl">⚡</span>
                            Akses Cepat - Menu Manajemen
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Manajemen Aset -->
                        <a href="{{ route('admin.assets.index') }}" class="action-card group block relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border-2 border-gray-200 dark:border-gray-700 group-hover:border-blue-500 dark:group-hover:border-blue-500">
                                <div class="flex justify-between items-start mb-6">
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Aset</h3>
                                    <span class="text-5xl group-hover:scale-125 transition-transform duration-300 icon-animate">ðŸ“¦</span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-6">
                                    Kelola inventaris perangkat TIK dengan tracking lengkap dan real-time
                                </p>
                                <div class="flex items-center gap-2 text-blue-600 dark:text-blue-400 font-semibold text-sm group-hover:gap-3 transition-all">
                                    <span>Akses Manajemen</span>
                                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <!-- Manajemen Kategori -->
                        <a href="{{ route('admin.categories.index') }}" class="action-card group block relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border-2 border-gray-200 dark:border-gray-700 group-hover:border-purple-500 dark:group-hover:border-purple-500">
                                <div class="flex justify-between items-start mb-6">
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Kategori</h3>
                                    <span class="text-5xl group-hover:scale-125 transition-transform duration-300 icon-animate">ðŸ“‚</span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-6">
                                    Organisir kategori aset dan jenis perangkat dengan sistematis
                                </p>
                                <div class="flex items-center gap-2 text-purple-600 dark:text-purple-400 font-semibold text-sm group-hover:gap-3 transition-all">
                                    <span>Akses Manajemen</span>
                                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <!-- Manajemen User -->
                        <a href="{{ route('admin.users.index') }}" class="action-card group block relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border-2 border-gray-200 dark:border-gray-700 group-hover:border-pink-500 dark:group-hover:border-pink-500">
                                <div class="flex justify-between items-start mb-6">
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen User</h3>
                                    <span class="text-5xl group-hover:scale-125 transition-transform duration-300 icon-animate">ðŸ‘¥</span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-6">
                                    Kelola admin, teknisi, dan pelapor dengan kontrol akses penuh
                                </p>
                                <div class="flex items-center gap-2 text-pink-600 dark:text-pink-400 font-semibold text-sm group-hover:gap-3 transition-all">
                                    <span>Akses Manajemen</span>
                                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </section>

                <!-- PERFORMA SISTEM -->
                <section class="mb-16">
                    <div class="section-underline mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                            <span class="text-4xl">✨</span>
                            Performa Sistem
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tiket Selesai -->
                        <div class="performance-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 mb-4">
                                            Terselesaikan
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Tiket Selesai</p>
                                        <div class="stat-value text-emerald-600 dark:text-emerald-500">
                                            {{ $doneTiket ?? 0 }}
                                        </div>
                                    </div>
                                    <span class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300">âœ“</span>
                                </div>
                                <div class="progress-bar mt-6">
                                    <div class="progress-fill bg-emerald-500" style="width: 75%;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Teknisi -->
                        <div class="performance-card group relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-blue-500 rounded-2xl opacity-20 group-hover:opacity-40 transition-all duration-500"></div>
                            <div class="relative bg-white dark:bg-gray-800 rounded-2xl p-8 card-base border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 mb-4">
                                            Tim Tersedia
                                        </span>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium mb-3">Total Teknisi</p>
                                        <div class="stat-value text-indigo-600 dark:text-indigo-500">
                                            {{ $totalTeknisi ?? 0 }}
                                        </div>
                                    </div>
                                    <span class="text-7xl opacity-10 group-hover:scale-110 transition-transform duration-300">ðŸ‘¥</span>
                                </div>
                                <div class="progress-bar mt-6">
                                    <div class="progress-fill bg-indigo-500" style="width: 60%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- QUICK ACTION FORMS -->
                <section class="mb-16">
                    <div class="section-underline mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                            <span class="text-4xl">🚀</span>
                            Form Cepat - Tambah Data
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- FORM TAMBAH ASET -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 transition-shadow">
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                                <span class="text-4xl">📦</span>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Aset</h3>
                            </div>

                            <form action="{{ route('admin.assets.store') }}" method="POST" class="space-y-4">
                                @csrf
                                
                                <!-- Tag Aset -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Tag Aset</label>
                                    <input type="text" name="asset_tag" placeholder="IT-L-001" required
                                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600 transition-all">
                                </div>

                                <!-- Nama Aset -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Nama Aset</label>
                                    <input type="text" name="name" placeholder="Laptop Dell" required
                                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600 transition-all">
                                </div>

                                <!-- Kategori -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Kategori</label>
                                    <select name="category_id" required
                                            class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:border-blue-500 dark:focus:bg-gray-600 transition-all">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($categories ?? [] as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Status -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Status</label>
                                    <select name="status" required
                                            class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:border-blue-500 dark:focus:bg-gray-600 transition-all">
                                        <option value="Baik">✓ Baik</option>
                                        <option value="Rusak Ringan">⚠ Rusak Ringan</option>
                                        <option value="Rusak Berat">❌ Rusak Berat</option>
                                        <option value="Afkir">🚫 Afkir</option>
                                    </select>
                                </div>

                                <!-- Lokasi -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Lokasi</label>
                                    <input type="text" name="location" placeholder="Ruang IT" 
                                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600 transition-all">
                                </div>

                                <button type="submit" class="w-full mt-6 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-bold py-3 rounded-lg transition-all transform hover:scale-105 active:scale-95">
                                    ✓ Simpan Aset
                                </button>
                            </form>
                        </div>

                        <!-- FORM TAMBAH USER -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 transition-shadow">
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                                <span class="text-4xl">👥</span>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah User</h3>
                            </div>

                            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
                                @csrf

                                <!-- Nama -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Nama</label>
                                    <input type="text" name="name" placeholder="Budi Santoso" required
                                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-green-500 focus:bg-white dark:focus:bg-gray-600 transition-all">
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Email</label>
                                    <input type="email" name="email" placeholder="user@simtik.com" required
                                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-green-500 focus:bg-white dark:focus:bg-gray-600 transition-all">
                                </div>

                                <!-- Password -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Password</label>
                                    <input type="password" name="password" placeholder="••••••••" required
                                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-green-500 focus:bg-white dark:focus:bg-gray-600 transition-all">
                                </div>

                                <!-- Role -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Role</label>
                                    <select name="role" required
                                            class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:border-green-500 dark:focus:bg-gray-600 transition-all">
                                        <option value="admin">👨‍💼 Admin</option>
                                        <option value="technician">🔧 Teknisi</option>
                                        <option value="user">👥 User</option>
                                    </select>
                                </div>

                                <!-- Divisi -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Divisi</label>
                                    <select name="division_id" required
                                            class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:border-green-500 dark:focus:bg-gray-600 transition-all">
                                        <option value="">-- Pilih Divisi --</option>
                                        @foreach ($divisions ?? [] as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="w-full mt-6 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 text-white font-bold py-3 rounded-lg transition-all transform hover:scale-105 active:scale-95">
                                    ✓ Simpan User
                                </button>
                            </form>
                        </div>

                        <!-- FORM TAMBAH KATEGORI -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 transition-shadow">
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                                <span class="text-4xl">🏷️</span>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Kategori</h3>
                            </div>

                            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
                                @csrf

                                <!-- Nama Kategori -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Nama Kategori</label>
                                    <input type="text" name="name" placeholder="Komputer & Laptop" required
                                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 focus:border-pink-500 focus:bg-white dark:focus:bg-gray-600 transition-all">
                                </div>

                                <!-- Info Section -->
                                <div class="bg-pink-50 dark:bg-pink-900/20 rounded-lg p-4 mt-6 border border-pink-200 dark:border-pink-800">
                                    <p class="text-sm text-pink-700 dark:text-pink-300">
                                        <strong>💡 Tip:</strong> Buat nama kategori yang jelas dan deskriptif untuk memudahkan pengelompokan aset.
                                    </p>
                                </div>

                                <!-- Large Textarea untuk kejelasan -->
                                <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                                    <p class="text-xs text-blue-700 dark:text-blue-300">
                                        <strong>ℹ️ Kategori yang ada:</strong><br>
                                        @foreach ($categories ?? [] as $cat)
                                            • {{ $cat->name }}<br>
                                        @endforeach
                                    </p>
                                </div>

                                <button type="submit" class="w-full mt-6 bg-gradient-to-r from-pink-600 to-pink-500 hover:from-pink-700 hover:to-pink-600 text-white font-bold py-3 rounded-lg transition-all transform hover:scale-105 active:scale-95">
                                    ✓ Simpan Kategori
                                </button>
                            </form>
                        </div>
                    </div>
                </section>

                <!-- INFO & TIPS SECTION -->
                <section class="mb-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Tips Banner -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/10 dark:to-indigo-900/10 border-l-4 border-blue-500 rounded-2xl p-8 card-base">
                            <div class="flex gap-4">
                                <span class="text-3xl flex-shrink-0">💡</span>
                                <div>
                                    <h3 class="font-bold text-gray-900 dark:text-white mb-2">Tips Penggunaan</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        Gunakan form cepat untuk menambah aset, user, atau kategori. Untuk edit/hapus data, gunakan menu "Akses Cepat" ke halaman manajemen penuh.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- System Info -->
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/10 dark:to-pink-900/10 border-l-4 border-purple-500 rounded-2xl p-8 card-base">
                            <div class="flex gap-4">
                                <span class="text-3xl flex-shrink-0">ℹ️</span>
                                <div>
                                    <h3 class="font-bold text-gray-900 dark:text-white mb-2">Informasi Sistem</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        Dashboard TIK versi 2.0 dengan form interaktif, dark mode, dan responsif di semua perangkat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
