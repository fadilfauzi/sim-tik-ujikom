<x-app-layout>
<x-slot name="header">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-bold text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent dark:from-blue-400 dark:via-purple-400 dark:to-pink-400">
                {{ __('Tambah Kategori Aset') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">Buat kategori baru untuk mengklasifikasi aset TIK</p>
        </div>
        <div class="text-4xl">🏷️</div>
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
        background: linear-gradient(90deg, #ec4899, #f59e0b, #3b82f6);
        border-radius: 0.75rem 0.75rem 0 0;
    }

    .form-group {
        animation: slideInLeft 0.5s ease-out forwards;
        opacity: 0;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }

    .modern-input {
        display: block;
        width: 100%;
        padding: 1rem 1.25rem;
        background-color: #f9fafb;
        border: 2px solid #e5e7eb;
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: inherit;
        position: relative;
    }

    .modern-input::placeholder {
        color: #d1d5db;
        transition: all 0.3s ease;
    }

    .modern-input:focus {
        outline: none;
        border-color: #ec4899;
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15), inset 0 0 0 1px rgba(236, 72, 153, 0.05);
        transform: translateY(-1px);
    }

    .modern-input:hover {
        border-color: #d1d5db;
        background-color: #fafbfc;
    }

    .dark .modern-input {
        background-color: #1f2937;
        border-color: #374151;
        color: #f3f4f6;
    }

    .dark .modern-input:focus {
        border-color: #f472b6;
        background-color: #111827;
        box-shadow: 0 0 0 3px rgba(244, 114, 182, 0.1);
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
        animation: floatIn 0.6s ease-out 0.2s forwards;
        opacity: 0;
    }

    .modern-btn {
        padding: 0.875rem 2rem;
        background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
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
        box-shadow: 0 15px 35px rgba(236, 72, 153, 0.4);
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
        background-color: #fce7f3;
        border-left: 4px solid #ec4899;
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
        background-color: #5f0f40;
        border-left-color: #f472b6;
    }

    .info-box p {
        color: #9f1239;
        font-size: 0.875rem;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .dark .info-box p {
        color: #fbcfe8;
    }
</style>

<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-xl mx-auto">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition duration-300 transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Kategori
            </a>
        </div>
        <div class="form-container bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl p-6 sm:p-8">
            <div class="info-box mb-6">
                <p>ℹ️ Kategori akan digunakan untuk mengklasifikasi dan mengelompokkan aset TIK dalam sistem.</p>
            </div>

            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Kategori -->
                <div class="form-group">
                    <label for="name" class="form-label">{{ __('Nama Kategori') }} <span class="text-red-500">*</span></label>
                    <input id="name" class="modern-input" type="text" name="name" 
                           value="{{ old('name') }}" placeholder="Contoh: Komputer & Laptop" 
                           required autofocus />
                    <span class="form-hint">Masukkan nama kategori yang deskriptif</span>
                    @if ($errors->has('name'))
                        <div class="error-message">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <!-- Button Group -->
                <div class="button-group">
                    <button type="submit" class="modern-btn">✓ Simpan Kategori</button>
                    <a href="{{ route('admin.categories.index') }}" class="cancel-link">✕ Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>