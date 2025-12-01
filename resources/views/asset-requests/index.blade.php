<style>
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-60px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .header-section {
        animation: fadeInDown 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .table-row {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .table-row:nth-child(1) { animation-delay: 0.1s; }
    .table-row:nth-child(2) { animation-delay: 0.2s; }
    .table-row:nth-child(3) { animation-delay: 0.3s; }
    .table-row:nth-child(4) { animation-delay: 0.4s; }
    .table-row:nth-child(5) { animation-delay: 0.5s; }

    .gradient-title {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .status-badge {
        transition: all 0.3s ease;
    }

    .status-badge:hover {
        transform: scale(1.05);
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <div class="header-section">
            <h1 class="text-4xl sm:text-5xl font-black gradient-title leading-tight">
                📋 Pengajuan Aset Saya
            </h1>
            <p class="text-gray-600 dark:text-gray-400 text-sm mt-3 font-medium">
                Kelola dan pantau status pengajuan aset Anda
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-50 to-green-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                <!-- PESAN STATUS -->
                @if (session('success'))
                    <div class="mb-8 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-2xl flex items-center gap-3 animation fadeInUp">
                        <span class="text-2xl">✅</span>
                        <div>
                            <strong>Berhasil!</strong>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-8 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 rounded-2xl flex items-center gap-3 animation fadeInUp">
                        <span class="text-2xl">❌</span>
                        <div>
                            <strong>Error!</strong>
                            <p>{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- TOMBOL AKSI -->
                <div class="mb-8">
                    <a href="{{ route('asset-requests.create') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-emerald-600 to-emerald-500 hover:from-emerald-700 hover:to-emerald-600 text-white font-bold rounded-xl shadow-lg hover:shadow-2xl transition-all transform hover:scale-105 active:scale-95">
                        <span>📦</span>
                        Ajukan Aset Baru
                    </a>
                </div>

                <!-- TABEL PENGAJUAN -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden card-base border border-gray-100 dark:border-gray-700">
                    
                    <!-- HEADER TABEL -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-gray-100 to-gray-50 dark:from-gray-700 dark:to-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">ID Pengajuan</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Aset</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Tgl Diajukan</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($requests as $request)
                                    <tr class="table-row hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-100 dark:bg-emerald-900/30">
                                                #{{ $request->id }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <div class="font-semibold text-gray-900 dark:text-white">[{{ $request->asset_tag }}] {{ $request->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300">
                                                🏷️ {{ $request->category->name }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="status-badge inline-flex items-center px-3 py-1 rounded-full text-xs font-bold
                                                @if($request->status == 'pending') bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300
                                                @elseif($request->status == 'approved') bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300
                                                @elseif($request->status == 'rejected') bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300
                                                @else bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 @endif">
                                                @if($request->status == 'pending') ⏳ Menunggu Persetujuan
                                                @elseif($request->status == 'approved') ✅ Disetujui
                                                @elseif($request->status == 'rejected') ❌ Ditolak
                                                @else ❓ {{ $request->status }} @endif
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                            {{ $request->created_at->format('d M Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <a href="{{ route('asset-requests.show', $request) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 font-semibold rounded-lg hover:bg-blue-200 dark:hover:bg-blue-900/50 transition-all transform hover:scale-105">
                                                <span>👁️</span>
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-16 text-center">
                                            <div class="flex flex-col items-center gap-4">
                                                <span class="text-6xl opacity-20">📦</span>
                                                <p class="text-gray-500 dark:text-gray-400 font-semibold">Belum ada pengajuan aset</p>
                                                <p class="text-sm text-gray-400 dark:text-gray-500">
                                                    Ajukan aset baru untuk ditambahkan ke sistem
                                                </p>
                                                <a href="{{ route('asset-requests.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition-colors">
                                                    <span>📦</span>
                                                    Ajukan Aset Baru
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($requests->hasPages())
                        <div class="bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                            {{ $requests->links() }}
                        </div>
                    @endif
                </div>

                <!-- INFO BANNER -->
                <div class="mt-12 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/10 dark:to-emerald-900/10 border-l-4 border-green-500 rounded-2xl p-8">
                    <div class="flex gap-4">
                        <span class="text-3xl flex-shrink-0">💡</span>
                        <div>
                            <h3 class="font-bold text-gray-900 dark:text-white mb-2">Penjelasan Status Pengajuan</h3>
                            <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                <li><strong>⏳ Menunggu Persetujuan:</strong> Pengajuan sedang ditinjau oleh admin</li>
                                <li><strong>✅ Disetujui:</strong> Pengajuan disetujui dan aset telah dibuat</li>
                                <li><strong>❌ Ditolak:</strong> Pengajuan ditolak dengan alasan tertentu</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
