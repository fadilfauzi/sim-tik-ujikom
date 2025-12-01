<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Aset: ' . $asset->name) }}
            </h2>
            <a href="{{ route('admin.assets.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div>
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Tag Aset</h3>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $asset->asset_tag }}</p>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Nama/Deskripsi</h3>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $asset->name }}</p>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Kategori</h3>
                            <p class="text-lg text-gray-900 dark:text-white">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded">
                                    {{ $asset->category->name ?? 'N/A' }}
                                </span>
                            </p>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Status Kondisi</h3>
                            <p class="text-lg">
                                @switch($asset->status)
                                    @case('Baik')
                                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded font-semibold">{{ $asset->status }}</span>
                                    @break
                                    @case('Rusak Ringan')
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded font-semibold">{{ $asset->status }}</span>
                                    @break
                                    @case('Rusak Berat')
                                        <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded font-semibold">{{ $asset->status }}</span>
                                    @break
                                    @case('Afkir')
                                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded font-semibold">{{ $asset->status }}</span>
                                    @break
                                @endswitch
                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Serial Number</h3>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $asset->serial_number ?? 'Tidak ada' }}</p>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Lokasi Penempatan</h3>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $asset->location ?? 'Tidak ada' }}</p>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Tanggal Pembelian</h3>
                            <p class="text-lg text-gray-900 dark:text-white">
                                {{ $asset->purchase_date ? \Carbon\Carbon::parse($asset->purchase_date)->format('d-m-Y') : 'Tidak ada' }}
                            </p>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Dibuat Pada</h3>
                            <p class="text-lg text-gray-900 dark:text-white">
                                {{ $asset->created_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex gap-4 border-t pt-6">
                    <a href="{{ route('admin.assets.edit', $asset) }}"
                       class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                        Edit Aset
                    </a>
                    <form method="POST" action="{{ route('admin.assets.destroy', $asset) }}"
                          style="display: inline;"
                          onsubmit="return confirm('Yakin ingin menghapus aset ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition">
                            Hapus Aset
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
