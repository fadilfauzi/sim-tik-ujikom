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
            <a href="{{ route('admin.asset-requests.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition">
                <span class="text-lg">📋</span>
                <span>Pengajuan Aset</span>
            </a>
            <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-2.5 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg font-medium border-l-4 border-blue-600 transition">
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
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen Kategori Aset</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Kelola kategori untuk klasifikasi aset TIK</p>
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

    
    <!-- Alert Messages -->
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

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-blue-50 dark:bg-blue-900/10 border border-blue-200 dark:border-blue-900/30 rounded-xl p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-blue-700 dark:text-blue-400 text-sm font-medium">Total Kategori</p>
                                <h3 class="text-3xl font-bold text-blue-600 dark:text-blue-500 mt-2">
                                    {{ $categories->total() }}
                                </h3>
                            </div>
                            <span class="text-3xl">🏷️</span>
                        </div>
                    </div>

                    <div class="bg-green-50 dark:bg-green-900/10 border border-green-200 dark:border-green-900/30 rounded-xl p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-green-700 dark:text-green-400 text-sm font-medium">Total Aset</p>
                                <h3 class="text-3xl font-bold text-green-600 dark:text-green-500 mt-2">
                                    {{ $categories->sum('assets_count') ?? 0 }}
                                </h3>
                            </div>
                            <span class="text-3xl">📦</span>
                        </div>
                    </div>
                </div>

                <!-- Add Category Button -->
                <div class="mb-6">
                    <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition">
                        <span class="mr-2">➕</span>
                        Tambah Kategori
                    </a>
                </div>

                <!-- Categories List -->
                @if($categories->count() > 0)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-900">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            Kategori
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            Jumlah Aset
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="text-2xl mr-3">📂</span>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                            {{ $category->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-sm text-gray-900 dark:text-white">
                                                    {{ $category->assets_count ?? 0 }} aset
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('admin.assets.create', ['category_id' => $category->id]) }}" class="inline-flex items-center px-3 py-1.5 bg-green-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-800 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition mr-2">
                                                    <span class="mr-1">➕</span>
                                                    Tambah Aset
                                                </a>
                                                <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-2">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori {{ $category->name }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        @if ($categories->hasPages())
                            <div class="bg-white dark:bg-gray-800 px-4 py-3 border-t border-gray-200 dark:border-gray-700 sm:px-6">
                                {{ $categories->links() }}
                            </div>
                        @endif
                    </div>
                @else
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-12 text-center">
                        <div class="text-5xl mb-4">📭</div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Kategori</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Buat kategori pertama untuk mengelompokkan aset Anda</p>
                        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition">
                            <span class="mr-2">➕</span>
                            Buat Kategori Pertama
                        </a>
                    </div>
                @endif
            </div>
        </main>
    </div>
</div>
</x-dashboard-layout>
