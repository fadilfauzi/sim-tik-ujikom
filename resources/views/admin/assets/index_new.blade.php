<x-dashboard-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent dark:from-blue-400 dark:via-purple-400 dark:to-pink-400">
                    {{ __('Manajemen Aset TIK') }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">Kelola semua aset TIK dan perangkat dalam sistem</p>
            </div>
            <div class="text-5xl">📦</div>
        </div>
    </x-slot>

    <style>
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .header-card {
            animation: slideDown 0.5s ease-out;
        }

        .asset-card {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .asset-card:nth-child(1) { animation-delay: 0.1s; }
        .asset-card:nth-child(2) { animation-delay: 0.2s; }
        .asset-card:nth-child(3) { animation-delay: 0.3s; }
        .asset-card:nth-child(4) { animation-delay: 0.4s; }
        .asset-card:nth-child(5) { animation-delay: 0.5s; }

        .asset-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            transition: all 0.3s ease;
        }

        .status-baik {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .status-ringan {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .status-berat {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .status-afkir {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-btn-edit {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .action-btn-edit:hover {
            background-color: #bfdbfe;
            transform: translateX(2px);
        }

        .action-btn-delete {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .action-btn-delete:hover {
            background-color: #fecaca;
            transform: translateX(-2px);
        }

        .dark .action-btn-edit {
            background-color: #1e3a8a;
            color: #93c5fd;
        }

        .dark .action-btn-delete {
            background-color: #7f1d1d;
            color: #fca5a5;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
    </style>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Alert Messages -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 rounded-lg">
                    <p class="text-green-700 dark:text-green-400 font-semibold">✓ {{ session('success') }}</p>
                </div>
            @endif

            <!-- Header Card -->
            <div class="header-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Aset</p>
                        <p class="text-4xl font-bold text-gray-900 dark:text-white mt-1">{{ $assets->total() }}</p>
                    </div>
                    <a href="{{ route('admin.asset-requests.index') }}" class="btn-primary">
                        <span>📋</span>
                        <span>Review Pengajuan</span>
                    </a>
                </div>
            </div>

            <!-- Assets Grid -->
            @if($assets->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach ($assets as $asset)
                        <div class="asset-card bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                            <!-- Card Header with Status -->
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-widest">{{ $asset->asset_tag }}</p>
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mt-2">{{ $asset->name }}</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">📁 {{ $asset->category->name ?? 'N/A' }}</p>
                                    </div>
                                    <span class="status-badge status-{{ Str::slug($asset->status) }}">
                                        @if($asset->status == 'Baik') ✓ Baik
                                        @elseif($asset->status == 'Rusak Ringan') ⚠ Ringan
                                        @elseif($asset->status == 'Rusak Berat') ❌ Berat
                                        @else 🚫 Afkir @endif
                                    </span>
                                </div>

                                <!-- Card Details Grid -->
                                <div class="grid grid-cols-2 gap-4 py-4 border-t border-gray-200 dark:border-gray-700">
                                    <div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Lokasi</p>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $asset->location ?? '-' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Serial</p>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $asset->serial_number ?? '-' }}</p>
                                    </div>
                                </div>

                                @if($asset->purchase_date)
                                    <div class="pt-2 border-t border-gray-200 dark:border-gray-700">
                                        <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Tanggal Pembelian</p>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($asset->purchase_date)->format('d M Y') }}</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Card Footer with Actions -->
                            <div class="px-6 py-3 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700 flex gap-2">
                                <a href="{{ route('admin.assets.edit', $asset) }}" class="action-btn action-btn-edit flex-1 justify-center">
                                    <span>✏️</span>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('admin.assets.destroy', $asset) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus aset {{ $asset->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn action-btn-delete w-full justify-center">
                                        <span>🗑️</span>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $assets->links() }}
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-12 empty-state">
                    <div class="empty-state-icon">📦</div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Aset</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Aset akan muncul setelah pengajuan disetujui</p>
                    <a href="{{ route('admin.asset-requests.index') }}" class="btn-primary">
                        <span>📋</span>
                        <span>Review Pengajuan</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>
