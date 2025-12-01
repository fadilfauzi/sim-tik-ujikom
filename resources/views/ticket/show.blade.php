<x-app-layout>
<x-slot name="header">
<div class="flex items-center justify-between">
    <div class="flex items-center space-x-3">
        <div class="p-2 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $ticket->subject }}</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Detail Laporan ID: {{ $ticket->id }}</p>
        </div>
    </div>
    <div class="flex items-center space-x-2">
        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold text-white 
            @if($ticket->status == 'Pending') bg-gradient-to-r from-red-500 to-pink-600
            @elseif($ticket->status == 'Processing') bg-gradient-to-r from-yellow-500 to-orange-600
            @elseif($ticket->status == 'Resolved') bg-gradient-to-r from-blue-500 to-cyan-600
            @elseif($ticket->status == 'Closed') bg-gradient-to-r from-green-500 to-emerald-600
            @else bg-gray-500 @endif
            shadow-lg transform transition-all duration-300 hover:scale-105">
            @if($ticket->status == 'Pending') ⏳ Pending
            @elseif($ticket->status == 'Processing') 🔄 Processing
            @elseif($ticket->status == 'Resolved') ✅ Resolved
            @elseif($ticket->status == 'Closed') ✅ Closed
            @else ❓ {{ $ticket->status }} @endif
        </span>
    </div>
</div>
</x-slot>

<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Alert Messages -->
        @if (session('success'))
            <div class="mb-6 animate-bounce-in">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-4 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Ticket Info Card -->
                <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-xl overflow-hidden transform transition-all duration-500 hover:shadow-2xl">
                    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold mb-2">{{ $ticket->subject }}</h2>
                                <div class="flex items-center space-x-4 text-indigo-100">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $ticket->reporter->name ?? 'N/A' }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $ticket->created_at->format('d M Y H:i') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-6">
                        <!-- Description -->
                        <div class="bg-blue-50 rounded-xl p-4 transform transition-all duration-300 hover:scale-105">
                            <h3 class="text-lg font-bold text-blue-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                Deskripsi Masalah
                            </h3>
                            <div class="bg-white rounded-lg p-4 text-gray-700 whitespace-pre-line leading-relaxed">
                                {{ $ticket->description }}
                            </div>
                        </div>

                        <!-- Image Upload -->
                        @if($ticket->image)
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 transform transition-all duration-300 hover:scale-105">
                            <h3 class="text-lg font-bold text-green-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                </svg>
                                Foto Lampiran
                            </h3>
                            <div class="bg-white rounded-lg p-4">
                                <img src="{{ asset('storage/' . $ticket->image) }}" alt="Foto Laporan" class="max-w-full h-auto rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" loading="lazy">
                                <p class="text-sm text-gray-500 mt-3 text-center">📎 {{ basename($ticket->image) }}</p>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Info Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Priority -->
                            <div class="bg-gradient-to-r from-orange-50 to-red-50 rounded-xl p-4 transform transition-all duration-300 hover:scale-105">
                                <h4 class="text-sm font-bold text-orange-700 mb-2 flex items-center">
                                    <span class="text-lg mr-2">🚨</span> Prioritas
                                </h4>
                                <div class="bg-white rounded-lg px-4 py-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold
                                        @if($ticket->priority == 'Low') bg-green-100 text-green-800
                                        @elseif($ticket->priority == 'Medium') bg-yellow-100 text-yellow-800
                                        @elseif($ticket->priority == 'High') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800 @endif
                                        shadow-md">
                                        @if($ticket->priority == 'Low') 🟢 Rendah
                                        @elseif($ticket->priority == 'Medium') 🟡 Sedang
                                        @elseif($ticket->priority == 'High') 🔴 Tinggi
                                        @else ❓ {{ $ticket->priority }} @endif
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Category -->
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 transform transition-all duration-300 hover:scale-105">
                                <h4 class="text-sm font-bold text-blue-700 mb-2 flex items-center">
                                    <span class="text-lg mr-2">📁</span> Kategori
                                </h4>
                                <div class="bg-white rounded-lg px-4 py-2">
                                    <p class="text-gray-900 font-semibold">{{ $ticket->category->name ?? 'Tidak ada kategori' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Asset Info -->
                        @if($ticket->asset)
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 transform transition-all duration-300 hover:scale-105">
                            <h4 class="text-lg font-bold text-purple-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                                </svg>
                                Detail Aset
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <div class="bg-white rounded-lg p-3">
                                    <p class="text-xs text-gray-500 mb-1">Aset</p>
                                    <p class="font-bold text-gray-900">[{{ $ticket->asset->asset_tag }}] {{ $ticket->asset->name }}</p>
                                </div>
                                <div class="bg-white rounded-lg p-3">
                                    <p class="text-xs text-gray-500 mb-1">Kategori</p>
                                    <p class="font-semibold text-gray-700">{{ $ticket->asset->category->name ?? 'N/A' }}</p>
                                </div>
                                <div class="bg-white rounded-lg p-3">
                                    <p class="text-xs text-gray-500 mb-1">Status</p>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                                        @if($ticket->asset->status == 'Baik') bg-green-100 text-green-800
                                        @elseif($ticket->asset->status == 'Rusak Ringan') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ $ticket->asset->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-4 opacity-75">
                            <h4 class="text-lg font-bold text-gray-600 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                Detail Aset
                            </h4>
                            <p class="text-gray-500 italic">Tidak ada aset terkait dengan laporan ini</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- Status Card -->
                <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-xl p-6 transform transition-all duration-500 hover:shadow-2xl">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                        Status & Penugasan
                    </h3>
                    
                    <div class="space-y-4">
                        <!-- Current Status -->
                        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-lg p-4">
                            <p class="text-sm font-medium text-gray-600 mb-2">Status Saat Ini</p>
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold text-white shadow-lg
                                @if($ticket->status == 'Pending') bg-gradient-to-r from-red-500 to-pink-600
                                @elseif($ticket->status == 'Processing') bg-gradient-to-r from-yellow-500 to-orange-600
                                @elseif($ticket->status == 'Resolved') bg-gradient-to-r from-blue-500 to-cyan-600
                                @elseif($ticket->status == 'Closed') bg-gradient-to-r from-green-500 to-emerald-600
                                @else bg-gray-500 @endif">
                                @if($ticket->status == 'Pending') ⏳ Pending
                                @elseif($ticket->status == 'Processing') 🔄 Processing
                                @elseif($ticket->status == 'Resolved') ✅ Resolved
                                @elseif($ticket->status == 'Closed') ✅ Closed
                                @else ❓ {{ $ticket->status }} @endif
                            </span>
                        </div>
                        
                        <!-- Technician -->
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg p-4">
                            <p class="text-sm font-medium text-gray-600 mb-2">Teknisi Ditugaskan</p>
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                    {{ substr($ticket->technician->name ?? 'N/A', 0, 1) }}
                                </div>
                                <p class="text-gray-900 font-semibold">{{ $ticket->technician->name ?? 'Belum Ditugaskan' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Update Form -->
                    @if(Auth::user()->role === 'admin' || Auth::user()->role === 'technician')
                    <div class="border-t mt-6 pt-6">
                        <h4 class="font-semibold mb-4 text-gray-700">Update Status</h4>
                        <form action="{{ route('tickets.update.status', $ticket) }}" method="POST" class="space-y-4">
                            @csrf
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ubah Status</label>
                                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                    @foreach(['Pending', 'Processing', 'Resolved', 'Closed'] as $statusOption)
                                        <option value="{{ $statusOption }}" {{ $ticket->status == $statusOption ? 'selected' : '' }}>
                                            {{ $statusOption }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            @if(Auth::user()->role === 'admin')
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tugaskan Teknisi</label>
                                <select name="technician_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">-- Pilih Teknisi --</option>
                                    @foreach ($technicians as $technician)
                                        <option value="{{ $technician->id }}" {{ $ticket->technician_id == $technician->id ? 'selected' : '' }}>
                                            {{ $technician->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-bold py-3 px-4 rounded-lg hover:from-indigo-600 hover:to-purple-700 transform transition-all duration-300 hover:scale-105 shadow-lg">
                                @if(Auth::user()->role === 'admin') 🛡️ Setujui & Teruskan
                                @else 🔧 Update Status
                                @endif
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes bounce-in {
    0% {
        opacity: 0;
        transform: scale(0.9);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-bounce-in {
    animation: bounce-in 0.6s ease-out;
}
</style>

</x-app-layout>