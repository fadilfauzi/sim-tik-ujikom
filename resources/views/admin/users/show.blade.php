<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail User: ' . $user->name) }}
            </h2>
            <a href="{{ route('admin.users.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Nama</h3>
                        <p class="text-lg text-gray-900 dark:text-white font-medium">{{ $user->name }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Email</h3>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $user->email }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Role</h3>
                        <p class="text-lg">
                            @switch($user->role)
                                @case('admin')
                                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded font-semibold">Admin</span>
                                @break
                                @case('technician')
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded font-semibold">Technician</span>
                                @break
                                @default
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded font-semibold">User</span>
                            @endswitch
                        </p>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Divisi</h3>
                        <p class="text-lg text-gray-900 dark:text-white">
                            {{ $user->division?->name ?? 'Tidak ada divisi' }}
                        </p>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Status Email</h3>
                        <p class="text-lg">
                            @if($user->email_verified_at)
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded font-semibold">
                                    Terverifikasi ({{ $user->email_verified_at->format('d-m-Y H:i') }})
                                </span>
                            @else
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded font-semibold">
                                    Belum Terverifikasi
                                </span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase">Dibuat Pada</h3>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $user->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex gap-4 border-t pt-6">
                    <a href="{{ route('admin.users.edit', $user) }}"
                       class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                        Edit User
                    </a>
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                          style="display: inline;"
                          onsubmit="return confirm('Yakin ingin menghapus user ini? Semua tiket yang dilaporkan akan tetap ada.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition">
                            Hapus User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
