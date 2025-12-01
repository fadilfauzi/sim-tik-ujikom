<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent dark:from-blue-400 dark:via-purple-400 dark:to-pink-400">
                    {{ __('Tambah Pengguna Baru') }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">Daftarkan pengguna baru ke dalam sistem</p>
            </div>
            <div class="text-4xl">👥</div>
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

        @keyframes floatIn {
            from {
                opacity: 0;
                transform: translateY(15px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        .form-container {
            animation: fadeInUp 0.6s ease-out;
            position: relative;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
            border-radius: 0.75rem 0.75rem 0 0;
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
        .form-group:nth-child(6) { animation-delay: 0.6s; }

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
            position: relative;
        }

        .modern-input::placeholder, .modern-select::placeholder {
            color: #d1d5db;
            transition: all 0.3s ease;
        }

        .modern-input:focus, .modern-select:focus {
            outline: none;
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15), inset 0 0 0 1px rgba(59, 130, 246, 0.05);
            transform: translateY(-1px);
        }

        .modern-input:hover, .modern-select:hover {
            border-color: #d1d5db;
            background-color: #fafbfc;
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
            animation: floatIn 0.6s ease-out 0.7s forwards;
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
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            text-transform: uppercase;
            letter-spacing: 0.03em;
            font-size: 0.875rem;
            position: relative;
            overflow: hidden;
        }

        .modern-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
            z-index: 0;
        }

        .modern-btn:hover::before {
            left: 100%;
        }

        .modern-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
        }

        .modern-btn:active {
            transform: translateY(-1px) scale(0.98);
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

        .info-box {
            padding: 1rem;
            background-color: #dbeafe;
            border-left: 4px solid #3b82f6;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            animation: slideInLeft 0.5s ease-out;
            position: relative;
            overflow: hidden;
        }

        .info-box::after {
            content: '';
            position: absolute;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 2s infinite;
        }

        .dark .info-box {
            background-color: #1e3a8a;
            border-left-color: #60a5fa;
        }

        .info-box p {
            color: #1e40af;
            font-size: 0.875rem;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .dark .info-box p {
            color: #93c5fd;
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
                    <p>ℹ️ Pastikan data yang Anda masukkan sudah benar. Email akan digunakan sebagai username untuk login.</p>
                </div>

                <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
                    @csrf

                    <!-- Nama -->
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('Nama Lengkap') }} <span class="text-red-500">*</span></label>
                        <input id="name" class="modern-input" type="text" name="name"
                               value="{{ old('name') }}" placeholder="Masukkan nama pengguna..." required autofocus />
                        <span class="form-hint">Contoh: Budi Santoso</span>
                        @if ($errors->has('name'))
                            <div class="error-message">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">{{ __('Alamat Email') }} <span class="text-red-500">*</span></label>
                        <input id="email" class="modern-input" type="email" name="email"
                               value="{{ old('email') }}" placeholder="contoh@simtik.com" required />
                        <span class="form-hint">Email harus unik dan tidak boleh digunakan pengguna lain</span>
                        @if ($errors->has('email'))
                            <div class="error-message">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <!-- Password & Confirm Password -->
                    <div class="form-row two-cols">
                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Password') }} <span class="text-red-500">*</span></label>
                            <input id="password" class="modern-input" type="password" name="password"
                                   placeholder="Minimal 8 karakter..." required />
                            <span class="form-hint">Gunakan password yang kuat</span>
                            @if ($errors->has('password'))
                                <div class="error-message">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">{{ __('Konfirmasi Password') }} <span class="text-red-500">*</span></label>
                            <input id="password_confirmation" class="modern-input" type="password"
                                   name="password_confirmation" placeholder="Ulangi password..." required />
                            <span class="form-hint">Harus sama dengan password di atas</span>
                            @if ($errors->has('password_confirmation'))
                                <div class="error-message">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>
                    </div>

                    <!-- Role & Division -->
                    <div class="form-row two-cols">
                        <div class="form-group">
                            <label for="role" class="form-label">{{ __('Peran (Role)') }} <span class="text-red-500">*</span></label>
                            <select id="role" name="role" class="modern-select" required>
                                <option value="">-- Pilih Peran --</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>👨‍💼 Administrator</option>
                                <option value="technician" {{ old('role') == 'technician' ? 'selected' : '' }}>🔧 Teknisi</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>👥 Pengguna</option>
                            </select>
                            <span class="form-hint">Pilih peran sesuai fungsi pengguna</span>
                            @if ($errors->has('role'))
                                <div class="error-message">{{ $errors->first('role') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="division_id" class="form-label">{{ __('Divisi') }} <span class="text-red-500">*</span></label>
                            <select id="division_id" name="division_id" class="modern-select" required>
                                <option value="">-- Pilih Divisi --</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}"
                                        {{ old('division_id') == $division->id ? 'selected' : '' }}>
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
                        <button type="submit" class="modern-btn">✓ Simpan Pengguna</button>
                        <a href="{{ route('admin.users.index') }}" class="cancel-link">✕ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>