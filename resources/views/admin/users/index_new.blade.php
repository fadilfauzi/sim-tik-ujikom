<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent dark:from-green-400 dark:via-emerald-400 dark:to-teal-400">
                    {{ __('Manajemen Pengguna') }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">Kelola akun pengguna dan hak akses mereka</p>
            </div>
            <div class="text-5xl">👥</div>
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

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .header-card {
            animation: slideDown 0.5s ease-out;
        }

        .user-item {
            animation: scaleIn 0.4s ease-out forwards;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .user-item:nth-child(1) { animation-delay: 0.1s; }
        .user-item:nth-child(2) { animation-delay: 0.2s; }
        .user-item:nth-child(3) { animation-delay: 0.3s; }
        .user-item:nth-child(4) { animation-delay: 0.4s; }
        .user-item:nth-child(5) { animation-delay: 0.5s; }

        .user-item:hover {
            transform: translateY(-2px);
        }

        .role-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .role-admin {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .role-technician {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }

        .role-user {
            background: linear-gradient(135deg, #10b981 0%, #047857 100%);
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
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
            box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
        }

        .user-avatar {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.25rem;
        }
    </style>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <!-- Alert Messages -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 rounded-lg">
                    <p class="text-green-700 dark:text-green-400 font-semibold">✓ {{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 rounded-lg">
                    <p class="text-red-700 dark:text-red-400 font-semibold">✕ {{ session('error') }}</p>
                </div>
            @endif

            <!-- Header Card -->
            <div class="header-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Pengguna</p>
                        <p class="text-4xl font-bold text-gray-900 dark:text-white mt-1">{{ $users->total() }}</p>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="btn-primary">
                        <span>➕</span>
                        <span>Tambah Pengguna</span>
                    </a>
                </div>
            </div>

            <!-- Users List -->
            @if($users->count() > 0)
                <div class="space-y-4">
                    @foreach ($users as $user)
                        <div class="user-item bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
                            <div class="p-4 sm:p-6">
                                <div class="flex items-center justify-between flex-wrap gap-4">
                                    <div class="flex items-center gap-4 flex-1 min-w-0">
                                        <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $user->name }}</h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                                            <div class="flex items-center gap-2 mt-2 flex-wrap">
                                                <span class="role-badge role-{{ strtolower($user->role) }}">
                                                    @if($user->role == 'admin') 🔴 Admin
                                                    @elseif($user->role == 'technician') 🔵 Teknisi
                                                    @else 🟢 User
                                                    @endif
                                                </span>
                                                @if($user->division)
                                                    <span class="text-xs bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full">{{ $user->division->name }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="action-btn action-btn-edit">
                                            <span>✏️</span>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pengguna {{ $user->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn action-btn-delete">
                                                <span>🗑️</span>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $users->links() }}
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-12 empty-state">
                    <div class="text-5xl mb-4">👤</div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Pengguna</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Tambahkan pengguna pertama ke sistem</p>
                    <a href="{{ route('admin.users.create') }}" class="btn-primary">
                        <span>➕</span>
                        <span>Tambah Pengguna Pertama</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
