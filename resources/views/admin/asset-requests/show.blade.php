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
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">📊</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.asset-requests.index') }}" class="flex items-center gap-3 px-4 py-2.5 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg font-medium border-l-4 border-blue-600 transition">
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
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Detail Pengajuan Aset</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Review dan proses pengajuan aset</p>
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
            <div class="p-8">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="max-w-4xl mx-auto">
                    <!-- Status Badge -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg mb-6">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <div>
                                    @if ($assetRequest->status === 'pending')
                                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                            ⏳ Menunggu Persetujuan
                                        </span>
                                    @elseif ($assetRequest->status === 'approved')
                                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            ✅ Disetujui
                                        </span>
                                    @elseif ($assetRequest->status === 'rejected')
                                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                            ❌ Ditolak
                                        </span>
                                    @endif
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    Diajukan pada: {{ $assetRequest->created_at->format('d M Y H:i') }}
                                </div>
                            </div>
                        </div>

                        <!-- Detail Information -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Informasi Aset -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">📦 Informasi Aset</h3>
                                    <div class="space-y-3">
                                        <div>
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Aset:</span>
                                            <p class="text-gray-900 dark:text-white">{{ $assetRequest->name }}</p>
                                        </div>
                                        <div>
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor Aset:</span>
                                            <p class="text-gray-900 dark:text-white">{{ $assetRequest->asset_tag }}</p>
                                        </div>
                                        <div>
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori:</span>
                                            <p class="text-gray-900 dark:text-white">{{ $assetRequest->category->name }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informasi Pengajuan -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">📋 Informasi Pengajuan</h3>
                                    <div class="space-y-3">
                                        <div>
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Pengaju:</span>
                                            <p class="text-gray-900 dark:text-white">{{ $assetRequest->user->name }}</p>
                                        </div>
                                        <div>
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Pengajuan:</span>
                                            <p class="text-gray-900 dark:text-white">{{ $assetRequest->created_at->format('d F Y') }}</p>
                                        </div>
                                        @if ($assetRequest->approved_at)
                                            <div>
                                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Diproses:</span>
                                                <p class="text-gray-900 dark:text-white">{{ $assetRequest->approved_at->format('d F Y H:i') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Alasan Pengajuan -->
                            <div class="mt-6">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">💬 Alasan Pengajuan</h3>
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $assetRequest->reason }}</p>
                                </div>
                            </div>

                            <!-- Catatan Tambahan -->
                            @if ($assetRequest->notes)
                                <div class="mt-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">📝 Catatan Tambahan</h3>
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $assetRequest->notes }}</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Informasi Persetujuan/Penolakan -->
                            @if ($assetRequest->status !== 'pending')
                                <div class="mt-6 p-4 rounded-lg @if ($assetRequest->status === 'approved') bg-green-50 dark:bg-green-900/20 @else bg-red-50 dark:bg-red-900/20 @endif">
                                    <h3 class="text-lg font-semibold @if ($assetRequest->status === 'approved') text-green-800 dark:text-green-200 @else text-red-800 dark:text-red-200 @endif mb-3">
                                        @if ($assetRequest->status === 'approved')
                                            ✅ Informasi Persetujuan
                                        @else
                                            ❌ Informasi Penolakan
                                        @endif
                                    </h3>
                                    <div class="space-y-2">
                                        <div>
                                            <span class="text-sm font-medium @if ($assetRequest->status === 'approved') text-green-600 dark:text-green-400 @else text-red-600 dark:text-red-400 @endif">Diproses oleh:</span>
                                            <p class="@if ($assetRequest->status === 'approved') text-green-800 dark:text-green-200 @else text-red-800 dark:text-red-200 @endif">{{ $assetRequest->approvedBy->name }}</p>
                                        </div>
                                        @if ($assetRequest->rejection_reason)
                                            <div>
                                                <span class="text-sm font-medium text-red-600 dark:text-red-400">Alasan Penolakan:</span>
                                                <p class="text-red-800 dark:text-red-200">{{ $assetRequest->rejection_reason }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            @if ($assetRequest->status === 'pending')
                                <div class="mt-8 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">🎯 Tindakan Persetujuan</h3>
                                    
                                    <!-- Approve Button -->
                                    <form action="{{ route('admin.asset-requests.approve', $assetRequest) }}" method="POST" class="mb-4">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition" onclick="return confirm('Setujui pengajuan ini? Aset akan dibuat otomatis.')">
                                            ✅ Setujui Pengajuan
                                        </button>
                                    </form>

                                    <!-- Reject Form -->
                                    <form action="{{ route('admin.asset-requests.reject', $assetRequest) }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="rejection_reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Alasan Penolakan <span class="text-red-500">*</span>
                                            </label>
                                            <textarea id="rejection_reason" name="rejection_reason" rows="3" 
                                                      class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-800 dark:text-white"
                                                      placeholder="Jelaskan mengapa pengajuan ini ditolak..." required></textarea>
                                            @error('rejection_reason')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition">
                                            ❌ Tolak Pengajuan
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-6">
                        <a href="{{ route('admin.asset-requests.index') }}" class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                            ← Kembali ke Daftar Pengajuan
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</x-dashboard-layout>
