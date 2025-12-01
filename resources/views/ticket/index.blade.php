<x-app-layout>
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition duration-300 transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Kelola Tiket</h1>
            <p class="text-gray-600 dark:text-gray-400">
                @if(auth()->user()->role === 'user')
                    Lihat dan kelola laporan masalah Anda
                @elseif(auth()->user()->role === 'technician')
                    Tiket yang ditugaskan untuk Anda
                @else
                    Kelola semua tiket dalam sistem
                @endif
            </p>
        </div>

        <!-- Action Button -->
        @if(auth()->user()->role === 'user')
        <div class="mb-6">
            <a href="{{ route('tickets.create') }}" class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                ➕ Buat Laporan Baru
            </a>
        </div>
        @endif

        <!-- Tickets Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            @if($tickets->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-white">ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-white">Subjek</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-white">Prioritas</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-white">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-white">Dibuat</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 dark:text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($tickets as $ticket)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    <span class="font-semibold">#{{ $ticket->id }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    {{ Str::limit($ticket->subject, 40) }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    @if($ticket->priority === 'High')
                                        <span class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200 rounded-full font-semibold text-xs">🔴 Tinggi</span>
                                    @elseif($ticket->priority === 'Medium')
                                        <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 rounded-full font-semibold text-xs">🟡 Sedang</span>
                                    @else
                                        <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-full font-semibold text-xs">🟢 Rendah</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    @if($ticket->status === 'Pending')
                                        <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 rounded-full font-semibold text-xs">⏳ Tertunda</span>
                                    @elseif($ticket->status === 'Processing')
                                        <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-200 rounded-full font-semibold text-xs">⚙️ Diproses</span>
                                    @elseif($ticket->status === 'Resolved')
                                        <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-full font-semibold text-xs">✅ Selesai</span>
                                    @else
                                        <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full font-semibold text-xs">🔒 Ditutup</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $ticket->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('tickets.show', $ticket) }}" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition text-xs">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <!-- Empty State -->
                <div class="py-16 text-center">
                    <div class="text-6xl mb-4">📭</div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Belum Ada Tiket</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        @if(auth()->user()->role === 'user')
                            Anda belum membuat laporan. Mulai buat laporan sekarang!
                        @elseif(auth()->user()->role === 'technician')
                            Tidak ada tiket yang ditugaskan untuk Anda.
                        @else
                            Belum ada tiket dalam sistem.
                        @endif
                    </p>
                    @if(auth()->user()->role === 'user')
                    <a href="{{ route('user.lapor.create') }}" class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                        Buat Laporan Sekarang
                    </a>
                    @endif
                </div>
            @endif
        </div>

        <!-- Stats -->
        @if($tickets->count() > 0)
        <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-4">
            @php
                $pending = $tickets->where('status', 'Pending')->count();
                $processing = $tickets->where('status', 'Processing')->count();
                $resolved = $tickets->where('status', 'Resolved')->count();
                $closed = $tickets->where('status', 'Closed')->count();
            @endphp
            
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                <div class="text-blue-600 dark:text-blue-400 text-sm font-semibold mb-1">Tertunda</div>
                <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $pending }}</div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                <div class="text-purple-600 dark:text-purple-400 text-sm font-semibold mb-1">Diproses</div>
                <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $processing }}</div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                <div class="text-green-600 dark:text-green-400 text-sm font-semibold mb-1">Selesai</div>
                <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $resolved }}</div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                <div class="text-gray-600 dark:text-gray-400 text-sm font-semibold mb-1">Ditutup</div>
                <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $closed }}</div>
            </div>
        </div>
        @endif
    </div>
</div>
</x-app-layout>
