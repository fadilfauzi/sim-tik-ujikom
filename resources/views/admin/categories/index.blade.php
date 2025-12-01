<x-dashboard-layout>
<x-slot name="header">
    <div class="header-section">
        <h1 class="text-4xl sm:text-5xl font-black gradient-title leading-tight">
            🏷️ Manajemen Kategori Aset
        </h1>
        <p class="text-gray-600 dark:text-gray-400 text-sm mt-3 font-medium">
            Atur dan kelola kategori aset untuk memudahkan pengelompokan perangkat
        </p>
    </div>
</x-slot>

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
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-50 to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

        <!-- Pesan Status -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700 p-6">
            <div class="flex justify-between mb-6">
                <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-150">
                    Tambah Kategori Baru
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Kategori
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($categories as $category)
                            <tr class="table-row">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <span class="text-6xl opacity-20">🏷️</span>
                                        <p class="text-gray-500 dark:text-gray-400 font-semibold">Tidak ada kategori yang ditemukan</p>
                                        <p class="text-sm text-gray-400 dark:text-gray-500">
                                            Buat kategori baru untuk mulai mengelompokkan aset TIK
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

</x-dashboard-layout>