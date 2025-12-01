<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent dark:from-blue-400 dark:via-purple-400 dark:to-pink-400">
                    {{ __('Tambah Aset TIK Baru') }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">Daftarkan aset TIK baru ke dalam sistem inventaris</p>
            </div>
            <div class="text-4xl">📦</div>
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

        @keyframes glow {
            0% { box-shadow: 0 0 5px rgba(139, 92, 246, 0); }
            50% { box-shadow: 0 0 20px rgba(139, 92, 246, 0.3); }
            100% { box-shadow: 0 0 5px rgba(139, 92, 246, 0); }
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
            background: linear-gradient(90deg, #8b5cf6, #ec4899, #f59e0b);
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
        .form-group:nth-child(7) { animation-delay: 0.7s; }

        .modern-input, .modern-select, .modern-textarea {
            display: block;
            width: 100%;
            padding: 0.875rem 1rem;
            background-color: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
            color: #1f2937;
            position: relative;
        }

        .modern-input::placeholder, .modern-select::placeholder, .modern-textarea::placeholder {
            color: #d1d5db;
            transition: all 0.3s ease;
        }

        .modern-input:focus, .modern-select:focus, .modern-textarea:focus {
            outline: none;
            border-color: #8b5cf6;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.15), inset 0 0 0 1px rgba(139, 92, 246, 0.05);
            transform: translateY(-1px);
        }

        .modern-input:hover, .modern-select:hover, .modern-textarea:hover {
            border-color: #d1d5db;
            background-color: #fafbfc;
        }

        .modern-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .dark .modern-input, .dark .modern-select, .dark .modern-textarea {
            background-color: #1f2937;
            border-color: #374151;
            color: #f3f4f6;
        }

        .dark .modern-input:focus, .dark .modern-select:focus, .dark .modern-textarea:focus {
            border-color: #a78bfa;
            background-color: #111827;
            box-shadow: 0 0 0 3px rgba(167, 139, 250, 0.1);
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
            animation: floatIn 0.6s ease-out 0.8s forwards;
            opacity: 0;
        }

        .modern-btn {
            padding: 0.875rem 2rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
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
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.4);
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

        .section-header {
            padding: 1rem;
            background: linear-gradient(135deg, #f3e8ff 0%, #fce7f3 100%);
            border-left: 4px solid #8b5cf6;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            margin-top: 1.5rem;
            animation: slideInLeft 0.5s ease-out;
            position: relative;
            overflow: hidden;
        }

        .section-header::after {
            content: '';
            position: absolute;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 2s infinite;
        }

        .dark .section-header {
            background: linear-gradient(135deg, #3c0563 0%, #5f0f40 100%);
            border-left-color: #a78bfa;
        }

        .section-header h3 {
            color: #6d28d9;
            font-size: 0.875rem;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            position: relative;
            z-index: 1;
        }

        .dark .section-header h3 {
            color: #e9d5ff;
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

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background-color: #f0fdf4;
            color: #166534;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 0.25rem;
        }

        .dark .status-badge {
            background-color: #064e3b;
            color: #dcfce7;
        }
    </style>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('admin.assets.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke Aset
                </a>
            </div>
            <div class="form-container bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl p-6 sm:p-8">
                <form action="{{ route('admin.assets.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Informasi Dasar -->
                    <div class="section-header">
                        <h3>📋 Informasi Dasar Aset</h3>
                    </div>

                    <!-- Asset Tag & Nama -->
                    <div class="form-row two-cols">
                        <div class="form-group">
                            <label for="asset_tag" class="form-label">{{ __('Tag Aset') }} <span class="text-red-500">*</span></label>
                            <input id="asset_tag" class="modern-input" type="text" name="asset_tag" 
                                   value="{{ old('asset_tag') }}" placeholder="Contoh: IT-L-001" required />
                            <span class="form-hint">Format: IT-[Tipe]-[Nomor] (Contoh: IT-L-001)</span>
                            @if ($errors->has('asset_tag'))
                                <div class="error-message">{{ $errors->first('asset_tag') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">{{ __('Nama/Deskripsi Aset') }} <span class="text-red-500">*</span></label>
                            <input id="name" class="modern-input" type="text" name="name" 
                                   value="{{ old('name') }}" placeholder="Contoh: Laptop Dell Latitude" required />
                            <span class="form-hint">Nama atau deskripsi singkat aset</span>
                            @if ($errors->has('name'))
                                <div class="error-message">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>

                    <!-- Kategori & Status -->
                    <div class="form-row two-cols">
                        <div class="form-group">
                            <label for="category_id" class="form-label">{{ __('Kategori Aset') }} <span class="text-red-500">*</span></label>
                            <select name="category_id" id="category_id" class="modern-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) || ($selectedCategoryId == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="form-hint">Pilih kategori sesuai jenis aset</span>
                            @if ($errors->has('category_id'))
                                <div class="error-message">{{ $errors->first('category_id') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status" class="form-label">{{ __('Status Kondisi') }} <span class="text-red-500">*</span></label>
                            <select name="status" id="status" class="modern-select" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Baik" {{ old('status') == 'Baik' ? 'selected' : '' }}>✓ Baik</option>
                                <option value="Rusak Ringan" {{ old('status') == 'Rusak Ringan' ? 'selected' : '' }}>⚠ Rusak Ringan</option>
                                <option value="Rusak Berat" {{ old('status') == 'Rusak Berat' ? 'selected' : '' }}>❌ Rusak Berat</option>
                                <option value="Afkir" {{ old('status') == 'Afkir' ? 'selected' : '' }}>🚫 Afkir</option>
                            </select>
                            <span class="form-hint">Status kondisi aset saat ini</span>
                            @if ($errors->has('status'))
                                <div class="error-message">{{ $errors->first('status') }}</div>
                            @endif
                        </div>
                    </div>

                    <!-- Informasi Detail -->
                    <div class="section-header">
                        <h3>🔍 Informasi Detail</h3>
                    </div>

                    <!-- Serial Number & Lokasi -->
                    <div class="form-row two-cols">
                        <div class="form-group">
                            <label for="serial_number" class="form-label">{{ __('Serial Number') }}</label>
                            <input id="serial_number" class="modern-input" type="text" name="serial_number" 
                                   value="{{ old('serial_number') }}" placeholder="Nomor seri aset (opsional)" />
                            <span class="form-hint">Biasanya tertera pada aset</span>
                            @if ($errors->has('serial_number'))
                                <div class="error-message">{{ $errors->first('serial_number') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="location" class="form-label">{{ __('Lokasi Penempatan') }}</label>
                            <input id="location" class="modern-input" type="text" name="location" 
                                   value="{{ old('location', 'Jl. Jendral Sudirman No.204, Sucikaler, Kec. Karangpawitan, Kabupaten Garut, Jawa Barat 44182') }}" placeholder="Contoh: Ruang IT, Lantai 2" />
                            <span class="form-hint">Tempat aset ditempatkan</span>
                            @if ($errors->has('location'))
                                <div class="error-message">{{ $errors->first('location') }}</div>
                            @endif
                        </div>
                    </div>

                    <!-- Tanggal Pembelian -->
                    <div class="form-group">
                        <label for="purchase_date" class="form-label">{{ __('Tanggal Pembelian') }}</label>
                        <input id="purchase_date" class="modern-input" type="date" name="purchase_date" 
                               value="{{ old('purchase_date') }}" />
                        <span class="form-hint">Tanggal aset dibeli (opsional)</span>
                        @if ($errors->has('purchase_date'))
                            <div class="error-message">{{ $errors->first('purchase_date') }}</div>
                        @endif
                    </div>

                    <!-- Button Group -->
                    <div class="button-group">
                        <button type="submit" class="modern-btn">✓ Simpan Aset</button>
                        <a href="{{ route('admin.assets.index') }}" class="cancel-link">✕ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>