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

    .content-section {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .info-card {
        animation: slideInLeft 0.5s ease-out forwards;
        opacity: 0;
    }

    .info-card:nth-child(1) { animation-delay: 0.1s; }
    .info-card:nth-child(2) { animation-delay: 0.2s; }
    .info-card:nth-child(3) { animation-delay: 0.3s; }

    .gradient-title {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .status-badge {
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .status-badge:hover {
        transform: scale(1.05);
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .info-item {
        padding: 1.5rem;
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        border-radius: 1rem;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .dark .info-item {
        background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        border-color: #374151;
    }

    .info-label {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #6b7280;
        margin-bottom: 0.5rem;
    }

    .dark .info-label {
        color: #9ca3af;
    }

    .info-value {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1f2937;
    }

    .dark .info-value {
        color: #f3f4f6;
    }

    .content-box {
        background-color: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-top: 1rem;
    }

    .dark .content-box {
        background-color: #1f2937;
        border-color: #374151;
    }

    .content-text {
        color: #4b5563;
        line-height: 1.6;
        white-space: pre-wrap;
    }

    .dark .content-text {
        color: #d1d5db;
    }

    .status-approved {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .status-rejected {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
    }

    .status-pending {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background-color: #f3f4f6;
        color: #4b5563;
        border-radius: 0.75rem;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        background-color: #e5e7eb;
        transform: translateX(-4px);
    }

    .dark .back-link {
        background-color: #374151;
        color: #d1d5db;
    }

    .dark .back-link:hover {
        background-color: #4b5563;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <div class="header-section">
            <h1 class="text-4xl sm:text-5xl font-black gradient-title leading-tight">
                📋 Detail Pengajuan Aset
            </h1>
            <p class="text-gray-600 dark:text-gray-400 text-sm mt-3 font-medium">
                Informasi lengkap pengajuan aset
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-50 to-green-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <!-- Back Button -->
                <div class="mb-6">
                    <a href="{{ route('asset-requests.index') }}" class="back-link">
                        <span>←</span>
                        Kembali ke Daftar Pengajuan
                    </a>
                </div>

                <!-- Status Badge -->
                <div class="content-section mb-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                @if ($assetRequest->status === 'pending')
                                    <span class="status-badge status-pending px-4 py-2 rounded-full text-sm font-bold">
                                        ⏳ Menunggu Persetujuan
                                    </span>
                                @elseif ($assetRequest->status === 'approved')
                                    <span class="status-badge status-approved px-4 py-2 rounded-full text-sm font-bold">
                                        ✅ Disetujui
                                    </span>
                                @elseif ($assetRequest->status === 'rejected')
                                    <span class="status-badge status-rejected px-4 py-2 rounded-full text-sm font-bold">
                                        ❌ Ditolak
                                    </span>
                                @endif
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Diajukan pada:</strong> {{ $assetRequest->created_at->format('d F Y H:i') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Information Grid -->
                <div class="info-grid mb-8">
                    <!-- Informasi Aset -->
                    <div class="info-card">
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                <span>📦</span> Informasi Aset
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="info-label">Nama Aset</div>
                                    <div class="info-value">{{ $assetRequest->name }}</div>
                                </div>
                                <div>
                                    <div class="info-label">Nomor Aset</div>
                                    <div class="info-value">{{ $assetRequest->asset_tag }}</div>
                                </div>
                                <div>
                                    <div class="info-label">Kategori</div>
                                    <div class="info-value">{{ $assetRequest->category->name }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Pengajuan -->
                    <div class="info-card">
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                <span>📋</span> Informasi Pengajuan
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="info-label">Pengaju</div>
                                    <div class="info-value">{{ $assetRequest->user->name }}</div>
                                </div>
                                <div>
                                    <div class="info-label">Tanggal Pengajuan</div>
                                    <div class="info-value">{{ $assetRequest->created_at->format('d F Y') }}</div>
                                </div>
                                @if ($assetRequest->approved_at)
                                    <div>
                                        <div class="info-label">Tanggal Diproses</div>
                                        <div class="info-value">{{ $assetRequest->approved_at->format('d F Y H:i') }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alasan Pengajuan -->
                <div class="info-card mb-8">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            <span>💬</span> Alasan Pengajuan
                        </h3>
                        <div class="content-box">
                            <p class="content-text">{{ $assetRequest->reason }}</p>
                        </div>
                    </div>
                </div>

                <!-- Catatan Tambahan -->
                @if ($assetRequest->notes)
                    <div class="info-card mb-8">
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                <span>📝</span> Catatan Tambahan
                            </h3>
                            <div class="content-box">
                                <p class="content-text">{{ $assetRequest->notes }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Informasi Persetujuan/Penolakan -->
                @if ($assetRequest->status !== 'pending')
                    <div class="info-card">
                        <div class="rounded-xl p-6 @if ($assetRequest->status === 'approved') bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 @else bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 @endif">
                            <h3 class="text-xl font-bold @if ($assetRequest->status === 'approved') text-green-800 dark:text-green-200 @else text-red-800 dark:text-red-200 @endif mb-4 flex items-center gap-2">
                                @if ($assetRequest->status === 'approved')
                                    <span>✅</span> Informasi Persetujuan
                                @else
                                    <span>❌</span> Informasi Penolakan
                                @endif
                            </h3>
                            <div class="space-y-3">
                                <div>
                                    <div class="info-label @if ($assetRequest->status === 'approved') text-green-600 dark:text-green-400 @else text-red-600 dark:text-red-400 @endif">Diproses oleh</div>
                                    <div class="info-value @if ($assetRequest->status === 'approved') text-green-800 dark:text-green-200 @else text-red-800 dark:text-red-200 @endif">{{ $assetRequest->approvedBy->name }}</div>
                                </div>
                                @if ($assetRequest->rejection_reason)
                                    <div>
                                        <div class="info-label text-red-600 dark:text-red-400">Alasan Penolakan</div>
                                        <div class="content-box bg-red-100 dark:bg-red-900/30 mt-2">
                                            <p class="content-text text-red-800 dark:text-red-200">{{ $assetRequest->rejection_reason }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
