<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent dark:from-blue-400 dark:via-purple-400 dark:to-pink-400">
                    {{ __('Edit Data Pengguna') }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">Perbarui informasi pengguna: <strong>{{ $user->name }}</strong></p>
            </div>
            <div class="text-4xl">✏️</div>
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
                transform: translateX(-15px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-container {
            animation: fadeInUp 0.6s ease-out;
        }

        .form-group {
            animation: slideInLeft 0.5s ease-out forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }

        .modern-input, .modern-select {
            display: block;
            width: 100%;
            padding: 0.875rem 1rem;
            background-color: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .modern-input:focus, .modern-select:focus {
            outline: none;
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .dark .modern-input, .dark .modern-select {
            background-color: #1f2937;
            border-color: #374151;
            color: #f3f4f6;
        }

        .dark .modern-input:focus, .dark .modern-select:focus {
            border-color: #60a5fa;
            background-color: #111827;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1);
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 0.875rem;
            color: #1f2937;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .dark .form-label {
            color: #e5e7eb;
        }

        .form-hint {
            display: block;
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.25rem;
        }

        .dark .form-hint {
            color: #9ca3af;
        }

        .error-message {
            padding: 0.5rem 0;
            color: #dc2626;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .dark .error-message {
            color: #fca5a5;
        }

        .button-group {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem;
            animation: slideInLeft 0.5s ease-out 0.6s forwards;
            opacity: 0;
        }

        .modern-btn {
            padding: 0.875rem 2rem;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            font-size: 0.875rem;
        }

        .modern-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .modern-btn:active {
            transform: translateY(0);
        }

        .cancel-link {
            padding: 0.875rem 2rem;
            background-color: #e5e7eb;
            color: #1f2937;
            border: none;
            border-radius: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            font-size: 0.875rem;
        }

        .cancel-link:hover {
            background-color: #d1d5db;
            transform: translateY(-2px);
        }

        .dark .cancel-link {
            background-color: #374151;
            color: #f3f4f6;
        }

        .dark .cancel-link:hover {
            background-color: #4b5563;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .form-row.two-cols {
                grid-template-columns: 1fr 1fr;
            }
        }

        .info-box {
            padding: 1rem;
            background-color: #dbeafe;
            border-left: 4px solid #3b82f6;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            animation: slideInLeft 0.5s ease-out;
        }

        .dark .info-box {
            background-color: #1e3a8a;
            border-left-color: #60a5fa;
        }

        .info-box p {
            color: #1e40af;
            font-size: 0.875rem;
            margin: 0;
        }

        .dark .info-box p {
            color: #93c5fd;
        }

        .user-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            border-radius: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 0.5rem;
        }
    </style>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke User
                </a>
            </div>
            <div class="form-container bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl p-6 sm:p-8">
                <div class="info-box mb-6">
                    <p>ℹ️ Ubah data pengguna sesuai kebutuhan. Jangan lupa untuk memperbarui password jika diperlukan.</p>
                </div>

                <!-- User Info Card -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg p-4 mb-6">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-500 text-white font-bold text-lg">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 dark:text-white">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $user->email }}</p>
                            <span class="inline-block px-2 py-1 mt-1 text-xs font-semibold rounded
                                {{ $user->role === 'admin' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : '' }}
                                {{ $user->role === 'technician' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : '' }}
                                {{ $user->role === 'user' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : '' }}
                            ">
                                {{ strtoupper($user->role) }}
                            </span>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Nama -->
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('Nama Lengkap') }} <span class="text-red-500">*</span></label>
                        <input id="name" class="modern-input" type="text" name="name"
                               value="{{ old('name', $user->name) }}" required autofocus />
                        <span class="form-hint">Nama lengkap pengguna</span>
                        @if ($errors->has('name'))
                            <div class="error-message">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">{{ __('Alamat Email') }} <span class="text-red-500">*</span></label>
                        <input id="email" class="modern-input" type="email" name="email"
                               value="{{ old('email', $user->email) }}" required />
                        <span class="form-hint">Email harus unik dalam sistem</span>
                        @if ($errors->has('email'))
                            <div class="error-message">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">{{ __('Password Baru') }} <span class="text-gray-400">(Opsional)</span></label>
                        <input id="password" class="modern-input" type="password" name="password" />
                        <span class="form-hint">Kosongkan jika tidak ingin mengubah password</span>
                        @if ($errors->has('password'))
                            <div class="error-message">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <!-- Role & Division -->
                    <div class="form-row two-cols">
                        <div class="form-group">
                            <label for="role" class="form-label">{{ __('Peran (Role)') }} <span class="text-red-500">*</span></label>
                            <select id="role" name="role" class="modern-select" required>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>👨‍💼 Administrator</option>
                                <option value="technician" {{ old('role', $user->role) == 'technician' ? 'selected' : '' }}>🔧 Teknisi</option>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>👥 Pengguna</option>
                            </select>
                            <span class="form-hint">Pilih peran sesuai fungsi pengguna</span>
                            @if ($errors->has('role'))
                                <div class="error-message">{{ $errors->first('role') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="division_id" class="form-label">{{ __('Divisi') }} <span class="text-red-500">*</span></label>
                            <select id="division_id" name="division_id" class="modern-select" required>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}"
                                        {{ old('division_id', $user->division_id) == $division->id ? 'selected' : '' }}>
                                        {{ $division->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="form-hint">Pilih divisi tempat pengguna bekerja</span>
                            @if ($errors->has('division_id'))
                                <div class="error-message">{{ $errors->first('division_id') }}</div>
                            @endif
                        </div>
                    </div>

                    <!-- Button Group -->
                    <div class="button-group">
                        <button type="submit" class="modern-btn">✓ Simpan Perubahan</button>
                        <a href="{{ route('admin.users.index') }}" class="cancel-link">✕ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
