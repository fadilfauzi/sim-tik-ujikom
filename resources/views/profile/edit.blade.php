<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent dark:from-blue-400 dark:via-purple-400 dark:to-pink-400">
                    {{ __('Profil Saya') }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">Kelola informasi akun dan pengaturan keamanan Anda</p>
            </div>
            <div class="text-4xl">👤</div>
        </div>
    </x-slot>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .profile-card {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .profile-card:nth-child(1) { animation-delay: 0.1s; }
        .profile-card:nth-child(2) { animation-delay: 0.2s; }
        .profile-card:nth-child(3) { animation-delay: 0.3s; }

        .profile-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #a855f7, #ec4899);
            transition: left 0.6s ease;
        }

        .profile-card:hover::before {
            left: 0;
        }

        .profile-card:hover {
            border-color: #d1d5db;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            transform: translateY(-4px);
        }

        .dark .profile-card {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            border-color: #374151;
        }

        .card-header-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #3b82f6, #a855f7);
            border-radius: 12px;
            color: white;
            font-size: 24px;
            margin-bottom: 16px;
            animation: slideInLeft 0.5s ease-out;
        }

        .form-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #d1d5db, transparent);
            margin: 24px 0;
        }

        .dark .form-divider {
            background: linear-gradient(90deg, transparent, #4b5563, transparent);
        }
    </style>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header Info Card -->
            <div class="profile-card p-6 sm:p-8 rounded-xl shadow-sm mb-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 text-white font-bold text-2xl">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold uppercase
                                {{ Auth::user()->role === 'admin' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : '' }}
                                {{ Auth::user()->role === 'technician' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : '' }}
                                {{ Auth::user()->role === 'user' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : '' }}
                            ">
                                {{ Auth::user()->role === 'admin' ? '👨‍💼 Administrator' : (Auth::user()->role === 'technician' ? '🔧 Teknisi' : '👥 Pengguna') }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Profile Information Card -->
            <div class="profile-card rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="card-header-icon">✏️</div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Informasi Profil</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Perbarui data pribadi dan email Anda</p>
                        </div>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password Card -->
            <div class="profile-card rounded-xl shadow-sm overflow-hidden mt-6">
                <div class="p-6 sm:p-8">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="card-header-icon">🔐</div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Keamanan Akun</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Perbarui password untuk keamanan lebih baik</p>
                        </div>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="profile-card rounded-xl shadow-sm overflow-hidden mt-6 border-red-200 dark:border-red-900">
                <div class="p-6 sm:p-8">
                    <div class="flex items-center space-x-3 mb-6">
                        <div style="background: linear-gradient(135deg, #ef4444, #dc2626);" class="card-header-icon">🗑️</div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Zona Berbahaya</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
