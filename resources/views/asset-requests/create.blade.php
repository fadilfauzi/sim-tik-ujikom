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

    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }

    .header-section {
        animation: fadeInDown 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .form-container {
        animation: fadeInUp 0.6s ease-out forwards;
        position: relative;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981, #059669, #10b981);
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

    .gradient-title {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

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
        border-color: #10b981;
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15), inset 0 0 0 1px rgba(16, 185, 129, 0.05);
        transform: translateY(-1px);
    }

    .modern-input:hover, .modern-select:hover, .modern-textarea:hover {
        border-color: #d1d5db;
        background-color: #fafbfc;
    }

    .modern-textarea {
        resize: vertical;
        min-height: 120px;
        font-family: inherit;
    }

    .dark .modern-input, .dark .modern-select, .dark .modern-textarea {
        background-color: #1f2937;
        border-color: #374151;
        color: #f3f4f6;
    }

    .dark .modern-input:focus, .dark .modern-select:focus, .dark .modern-textarea:focus {
        border-color: #10b981;
        background-color: #111827;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
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
        animation: fadeInUp 0.6s ease-out 0.5s forwards;
        opacity: 0;
    }

    .modern-btn {
        padding: 0.875rem 2rem;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
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

    .warning-box {
        padding: 1rem;
        background-color: #fef3c7;
        border-left: 4px solid #f59e0b;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        animation: slideInLeft 0.5s ease-out;
        position: relative;
        overflow: hidden;
    }

    .warning-box::after {
        content: '';
        position: absolute;
        top: 0;
        right: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        animation: shimmer 2s infinite;
    }

    .dark .warning-box {
        background-color: #78350f;
        border-left-color: #fbbf24;
    }

    .warning-box p {
        color: #92400e;
        font-size: 0.875rem;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .dark .warning-box p {
        color: #fcd34d;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <div class="header-section">
            <h1 class="text-4xl sm:text-5xl font-black gradient-title leading-tight">
                📦 Ajukan Aset Baru
            </h1>
            <p class="text-gray-600 dark:text-gray-400 text-sm mt-3 font-medium">
                Ajukan perangkat TIK baru untuk ditambahkan ke sistem
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-50 to-green-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <div class="py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="form-container bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl p-6 sm:p-8">
                    <div class="warning-box mb-6">
                        <p>⚠️ <strong>Penting:</strong> Pengajuan aset akan ditinjau oleh admin. Pastikan informasi yang Anda berikan lengkap dan akurat.</p>
                    </div>

                    <form action="{{ route('asset-requests.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Nama Aset -->
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Aset <span class="text-red-500">*</span></label>
                            <input id="name" class="modern-input" type="text" name="name" 
                                   value="{{ old('name') }}" placeholder="Contoh: Laptop Dell Vostro 15" 
                                   required autofocus />
                            <span class="form-hint">Nama lengkap perangkat yang diajukan</span>
                            @if ($errors->has('name'))
                                <div class="error-message">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <!-- Asset Tag -->
                        <div class="form-group">
                            <label for="asset_tag" class="form-label">Nomor Aset <span class="text-red-500">*</span></label>
                            <input id="asset_tag" class="modern-input" type="text" name="asset_tag" 
                                   value="{{ old('asset_tag') }}" placeholder="Contoh: IT-001" 
                                   required />
                            <span class="form-hint">Kode unik identifikasi aset (harus unik)</span>
                            @if ($errors->has('asset_tag'))
                                <div class="error-message">{{ $errors->first('asset_tag') }}</div>
                            @endif
                        </div>

                        <!-- Kategori -->
                        <div class="form-group">
                            <label for="category_id" class="form-label">Kategori Aset <span class="text-red-500">*</span></label>
                            <select name="category_id" id="category_id" class="modern-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="form-hint">Pilih kategori yang sesuai untuk aset ini</span>
                            @if ($errors->has('category_id'))
                                <div class="error-message">{{ $errors->first('category_id') }}</div>
                            @endif
                        </div>

                        <!-- Alasan Pengajuan -->
                        <div class="form-group">
                            <label for="reason" class="form-label">Alasan Pengajuan <span class="text-red-500">*</span></label>
                            <textarea id="reason" name="reason" class="modern-textarea" required 
                                      placeholder="Jelaskan mengapa aset ini diperlukan:&#10;- Untuk keperluan apa?&#10;- Mengapa aset ini penting?&#10;- Siapa yang akan menggunakan?">{{ old('reason') }}</textarea>
                            <span class="form-hint">Jelaskan alasan mengapa aset ini perlu ditambahkan (minimal 10 karakter)</span>
                            @if ($errors->has('reason'))
                                <div class="error-message">{{ $errors->first('reason') }}</div>
                            @endif
                        </div>

                        <!-- Catatan Tambahan -->
                        <div class="form-group">
                            <label for="notes" class="form-label">Catatan Tambahan</label>
                            <textarea id="notes" name="notes" class="modern-textarea" 
                                      placeholder="Informasi tambahan yang relevan (opsional)">{{ old('notes') }}</textarea>
                            <span class="form-hint">Spesifikasi teknis atau informasi penting lainnya</span>
                            @if ($errors->has('notes'))
                                <div class="error-message">{{ $errors->first('notes') }}</div>
                            @endif
                        </div>

                        <!-- Button Group -->
                        <div class="button-group">
                            <button type="submit" class="modern-btn">
                                ✅ Kirim Pengajuan
                            </button>
                            <a href="{{ route('asset-requests.index') }}" class="cancel-link">
                                ❌ Batal
                            </a>
                        </div>
                    </form>

                    <!-- Tips Section -->
                    <div class="mt-8 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/10 dark:to-emerald-900/10 border-l-4 border-green-500 rounded-2xl p-6">
                        <div class="flex gap-4">
                            <span class="text-3xl flex-shrink-0">💡</span>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-2">Tips Membuat Pengajuan yang Baik:</h3>
                                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                    <li>✓ Gunakan nama aset yang jelas dan spesifik</li>
                                    <li>✓ Sertakan nomor tag aset yang unik</li>
                                    <li>✓ Jelaskan alasan pengajuan secara detail</li>
                                    <li>✓ Sertakan spesifikasi teknis jika diperlukan</li>
                                    <li>✓ Sebutkan siapa yang akan menggunakan aset</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
