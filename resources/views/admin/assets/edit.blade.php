<x-app-layout>
<x-slot name="header">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-bold text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent dark:from-blue-400 dark:via-purple-400 dark:to-pink-400">
                {{ __('Edit Data Aset') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">Perbarui informasi aset: <strong>{{ $asset->asset_tag }}</strong></p>
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
        .form-group:nth-child(7) { animation-delay: 0.7s; }    .modern-input, .modern-select {
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
    }

    .modern-input:focus, .modern-select:focus {
        outline: none;
        border-color: #8b5cf6;
        background-color: #ffffff;
        box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
    }

    .dark .modern-input, .dark .modern-select {
        background-color: #1f2937;
        border-color: #374151;
        color: #f3f4f6;
    }

    .dark .modern-input:focus, .dark .modern-select:focus {
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
        animation: slideInLeft 0.5s ease-out 0.8s forwards;
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
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        font-size: 0.875rem;
    }

    .modern-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3);
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

    .section-header {
        padding: 1rem;
        background: linear-gradient(135deg, #f3e8ff 0%, #fce7f3 100%);
        border-left: 4px solid #8b5cf6;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        margin-top: 1.5rem;
        animation: slideInLeft 0.5s ease-out;
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

    .asset-info-card {
        padding: 1.25rem;
        background: linear-gradient(135deg, #f3e8ff 0%, #ffffff 100%);
        border: 2px solid #e9d5ff;
        border-radius: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .dark .asset-info-card {
        background: linear-gradient(135deg, #3c0563 0%, #1f2937 100%);
        border-color: #6b21a8;
    }

    .asset-tag {
        font-size: 0.75rem;
        font-weight: 700;
        color: #7c3aed;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    .dark .asset-tag {
        color: #d8b4fe;
    }

    .asset-name {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0.5rem 0;
    }

    .dark .asset-name {
        color: #f3f4f6;
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
            <!-- Asset Info Card -->
            <div class="asset-info-card">
                <div class="asset-tag">📦 TAG ASET</div>
                <div class="asset-name">{{ $asset->asset_tag }}</div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ $asset->name }}</p>
                <div class="flex gap-2 flex-wrap">
                    <span class="inline-block px-2 py-1 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 text-xs font-semibold rounded">
                        📂 {{ $asset->category->name ?? '-' }}
                    </span>
                    <span class="inline-block px-2 py-1 
                        {{ $asset->status === 'Baik' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : '' }}
                        {{ $asset->status === 'Rusak Ringan' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : '' }}
                        {{ $asset->status === 'Rusak Berat' ? 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200' : '' }}
                        {{ $asset->status === 'Afkir' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : '' }}
                        text-xs font-semibold rounded">
                        {{ $asset->status }}
                    </span>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.assets.update', $asset) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Informasi Dasar -->
                <div class="section-header">
                    <h3>📋 Informasi Dasar</h3>
                </div>

                <!-- Asset Tag & Nama -->
                <div class="form-row two-cols">
                    <div class="form-group">
                        <label for="asset_tag" class="form-label">{{ __('Tag Aset') }} <span class="text-red-500">*</span></label>
                        <input id="asset_tag" class="modern-input" type="text" name="asset_tag" 
                               value="{{ old('asset_tag', $asset->asset_tag) }}" required />
                        <span class="form-hint">Format: IT-[Tipe]-[Nomor]</span>
                        @if ($errors->has('asset_tag'))
                            <div class="error-message">{{ $errors->first('asset_tag') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('Nama/Deskripsi Aset') }} <span class="text-red-500">*</span></label>
                        <input id="name" class="modern-input" type="text" name="name" 
                               value="{{ old('name', $asset->name) }}" required />
                        <span class="form-hint">Deskripsi singkat aset</span>
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
                                <option value="{{ $category->id }}" {{ old('category_id', $asset->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="form-hint">Kategori aset</span>
                        @if ($errors->has('category_id'))
                            <div class="error-message">{{ $errors->first('category_id') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="status" class="form-label">{{ __('Status Kondisi') }} <span class="text-red-500">*</span></label>
                        <select name="status" id="status" class="modern-select" required>
                            <option value="Baik" {{ old('status', $asset->status) == 'Baik' ? 'selected' : '' }}>✓ Baik</option>
                            <option value="Rusak Ringan" {{ old('status', $asset->status) == 'Rusak Ringan' ? 'selected' : '' }}>⚠ Rusak Ringan</option>
                            <option value="Rusak Berat" {{ old('status', $asset->status) == 'Rusak Berat' ? 'selected' : '' }}>❌ Rusak Berat</option>
                            <option value="Afkir" {{ old('status', $asset->status) == 'Afkir' ? 'selected' : '' }}>🚫 Afkir</option>
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
                               value="{{ old('serial_number', $asset->serial_number) }}" />
                        <span class="form-hint">Nomor seri aset (opsional)</span>
                        @if ($errors->has('serial_number'))
                            <div class="error-message">{{ $errors->first('serial_number') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="location" class="form-label">{{ __('Lokasi Penempatan') }}</label>
                        <input id="location" class="modern-input" type="text" name="location" 
                               value="{{ old('location', $asset->location) }}" />
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
                           value="{{ old('purchase_date', $asset->purchase_date ? \Carbon\Carbon::parse($asset->purchase_date)->format('Y-m-d') : '') }}" />
                    <span class="form-hint">Tanggal aset dibeli (opsional)</span>
                    @if ($errors->has('purchase_date'))
                        <div class="error-message">{{ $errors->first('purchase_date') }}</div>
                    @endif
                </div>

                <!-- Button Group -->
                <div class="button-group">
                    <button type="submit" class="modern-btn">✓ Simpan Perubahan</button>
                    <a href="{{ route('admin.assets.index') }}" class="cancel-link">✕ Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>