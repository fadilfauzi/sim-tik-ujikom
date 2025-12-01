<x-app-layout>
<x-slot name="header">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-bold text-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent dark:from-blue-400 dark:via-purple-400 dark:to-pink-400">
                {{ __('Formulir Pelaporan Kerusakan') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">Laporkan kerusakan atau masalah pada aset TIK</p>
        </div>
        <div class="text-4xl">📋</div>
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

    @keyframes pulse-border {
        0% { border-color: #f59e0b; box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); }
        50% { box-shadow: 0 0 0 10px rgba(245, 158, 11, 0); }
        100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0); }
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
        height: 4px;
        background: linear-gradient(90deg, #f59e0b, #dc2626, #f59e0b);
        border-radius: 0.75rem 0.75rem 0 0;
    }

    .form-group {
        animation: slideInLeft 0.5s ease-out forwards;
        opacity: 0;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }

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
        border-color: #f59e0b;
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15), inset 0 0 0 1px rgba(245, 158, 11, 0.05);
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
        border-color: #fbbf24;
        background-color: #111827;
        box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.1);
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
        animation: floatIn 0.6s ease-out 0.4s forwards;
        opacity: 0;
    }

    .modern-btn {
        padding: 0.875rem 2rem;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
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
        box-shadow: 0 15px 35px rgba(245, 158, 11, 0.4);
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

    .section-header {
        padding: 1rem;
        background: linear-gradient(135deg, #fef3c7 0%, #fed7aa 100%);
        border-left: 4px solid #f59e0b;
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
        background: linear-gradient(135deg, #5d2b0f 0%, #7c2d12 100%);
        border-left-color: #fbbf24;
    }

    .section-header h3 {
        color: #b45309;
        font-size: 0.875rem;
        font-weight: 700;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        position: relative;
        z-index: 1;
    }

    .dark .section-header h3 {
        color: #fde68a;
    }
</style>

<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="form-container bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl p-6 sm:p-8">
            <div class="warning-box mb-6">
                <p>⚠️ <strong>Petunjuk Penting:</strong> Jelaskan masalah atau kerusakan dengan detail agar teknisi dapat dengan cepat menangani laporan Anda.</p>
            </div>

            <form action="{{ route('user.lapor.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Judul Laporan -->
                <div class="form-group">
                    <label for="subject" class="form-label">{{ __('Judul Laporan') }} <span class="text-red-500">*</span></label>
                    <input id="subject" class="modern-input" type="text" name="subject" 
                           value="{{ old('subject') }}" placeholder="Contoh: Laptop tidak bisa start" 
                           required autofocus />
                    <span class="form-hint">Buat judul yang singkat dan deskriptif</span>
                    @if ($errors->has('subject'))
                        <div class="error-message">{{ $errors->first('subject') }}</div>
                    @endif
                </div>

                <!-- Kategori Aset -->
                <div class="form-group">
                    <label for="category_id" class="form-label">{{ __('Kategori Aset') }} <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id" class="modern-select" onchange="showAssetDropdown()">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="1">Komputer & Laptop</option>
                        <option value="2">Jaringan (Router/Switch)</option>
                        <option value="3">Printer & Scanner</option>
                        <option value="4">Server</option>
                    </select>
                    <span class="form-hint">Pilih kategori aset yang bermasalah</span>
                    @if ($errors->has('category_id'))
                        <div class="error-message">{{ $errors->first('category_id') }}</div>
                    @endif
                </div>

                <!-- Prioritas -->
                <div class="form-group">
                    <label for="priority" class="form-label">{{ __('Prioritas') }} <span class="text-red-500">*</span></label>
                    <select name="priority" id="priority" class="modern-select">
                        <option value="">-- Pilih Prioritas --</option>
                        <option value="Low">🟢 Rendah</option>
                        <option value="Medium">🟡 Sedang</option>
                        <option value="High">🔴 Tinggi</option>
                    </select>
                    <span class="form-hint">Pilih tingkat prioritas masalah</span>
                    @if ($errors->has('priority'))
                        <div class="error-message">{{ $errors->first('priority') }}</div>
                    @endif
                </div>

                <!-- Nama & Nomor Aset -->
                <div class="form-group" id="asset_group">
                    <label for="asset_id" class="form-label">{{ __('Nama & Nomor Aset') }}</label>
                    <select name="asset_id" id="asset_id" class="modern-select">
                        <option value="">-- Pilih Aset --</option>
                        <option value="3">[KMP-001] Laptop Dell Latitude 5420</option>
                        <option value="4">[KMP-002] Laptop HP EliteBook 840 G8</option>
                        <option value="5">[KMP-003] PC Lenovo ThinkCentre M70q</option>
                        <option value="6">[KMP-004] Laptop ASUS VivoBook 15 (⚠️ Rusak Ringan)</option>
                        <option value="7">[KMP-005] PC Dell OptiPlex 3090</option>
                        <option value="8">[KMP-006] Laptop Acer Swift 3</option>
                        <option value="9">[KMP-007] MacBook Air M1</option>
                        <option value="10">[KMP-008] PC HP ProDesk 400 G6 (⚠️ Rusak Ringan)</option>
                    </select>
                    <span class="form-hint">Pilih aset spesifik yang mengalami masalah</span>
                    @if ($errors->has('asset_id'))
                        <div class="error-message">{{ $errors->first('asset_id') }}</div>
                    @endif
                </div>

                <!-- Deskripsi Kerusakan -->
                <div class="form-group">
                    <label for="description" class="form-label">{{ __('Deskripsi Detail Kerusakan') }} <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" class="modern-textarea" required 
                              placeholder="Jelaskan masalah secara detail:&#10;- Kapan masalah terjadi?&#10;- Gejala yang dialami?&#10;- Langkah yang sudah dicoba?&#10;- Pengguna yang terdampak?">{{ old('description') }}</textarea>
                    <span class="form-hint">Minimal 10 karakter, semakin detail semakin baik</span>
                    @if ($errors->has('description'))
                        <div class="error-message">{{ $errors->first('description') }}</div>
                    @endif
                </div>

                <!-- Button Group -->
                <div class="button-group">
                    <button type="submit" class="modern-btn">✓ Kirim Laporan</button>
                    <a href="{{ route('dashboard') }}" class="cancel-link">✕ Batal</a>
                </div>
            </form>

            <div class="section-header mt-8">
                <h3>💡 Tips Membuat Laporan yang Baik:</h3>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 rounded p-4 mt-4">
                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    <li>✓ Gunakan judul yang jelas dan spesifik</li>
                    <li>✓ Sertakan nomor tag aset jika ada</li>
                    <li>✓ Jelaskan kapan masalah terjadi (hari dan jam)</li>
                    <li>✓ Jelaskan gejala yang Anda alami dengan detail</li>
                    <li>✓ Sebutkan siapa saja yang terdampak</li>
                    <li>✓ Sampaikan langkah atau solusi yang sudah Anda coba</li>
                    <li>✓ Berikan informasi kontak yang dapat dihubungi</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
// Static asset data untuk dropdown dinamis
const staticAssets = {
    1: [ // Komputer & Laptop
        {id: 3, tag: 'KMP-001', name: 'Laptop Dell Latitude 5420', status: 'Baik'},
        {id: 4, tag: 'KMP-002', name: 'Laptop HP EliteBook 840 G8', status: 'Baik'},
        {id: 5, tag: 'KMP-003', name: 'PC Lenovo ThinkCentre M70q', status: 'Baik'},
        {id: 6, tag: 'KMP-004', name: 'Laptop ASUS VivoBook 15', status: 'Rusak Ringan'},
        {id: 7, tag: 'KMP-005', name: 'PC Dell OptiPlex 3090', status: 'Baik'},
        {id: 8, tag: 'KMP-006', name: 'Laptop Acer Swift 3', status: 'Baik'},
        {id: 9, tag: 'KMP-007', name: 'MacBook Air M1', status: 'Baik'},
        {id: 10, tag: 'KMP-008', name: 'PC HP ProDesk 400 G6', status: 'Rusak Ringan'}
    ],
    2: [ // Jaringan
        {id: 11, tag: 'NET-001', name: 'Router Cisco 2911', status: 'Baik'},
        {id: 12, tag: 'NET-002', name: 'Switch Cisco Catalyst 2960', status: 'Baik'},
        {id: 13, tag: 'NET-003', name: 'Router TP-Link Archer AX6000', status: 'Baik'},
        {id: 14, tag: 'NET-004', name: 'Switch D-Link DES-1024', status: 'Baik'},
        {id: 15, tag: 'NET-005', name: 'Access Point Ubiquiti UniFi 6 LR', status: 'Baik'},
        {id: 16, tag: 'NET-006', name: 'Router MikroTik RouterBOARD 3011', status: 'Rusak Ringan'},
        {id: 17, tag: 'NET-007', name: 'Switch Netgear GS108', status: 'Baik'},
        {id: 18, tag: 'NET-008', name: 'Router ASUS RT-AX88U', status: 'Baik'}
    ],
    3: [ // Printer & Scanner
        {id: 19, tag: 'PRT-001', name: 'Printer HP LaserJet Pro M404n', status: 'Baik'},
        {id: 20, tag: 'PRT-002', name: 'Printer Epson EcoTank L3150', status: 'Rusak Ringan'},
        {id: 21, tag: 'PRT-003', name: 'Scanner Canon CanoScan LiDE 400', status: 'Baik'},
        {id: 22, tag: 'PRT-004', name: 'Printer Brother DCP-L2550DW', status: 'Baik'},
        {id: 23, tag: 'PRT-005', name: 'Printer Canon PIXMA G3010', status: 'Baik'},
        {id: 24, tag: 'PRT-006', name: 'Scanner Epson Perfection V600', status: 'Baik'},
        {id: 25, tag: 'PRT-007', name: 'Printer Xerox WorkCentre 6515', status: 'Rusak Ringan'},
        {id: 26, tag: 'PRT-008', name: 'Printer Samsung Xpress M2070', status: 'Baik'}
    ],
    4: [ // Server
        {id: 27, tag: 'SRV-001', name: 'Server Dell PowerEdge R740', status: 'Baik'},
        {id: 28, tag: 'SRV-002', name: 'Server HPE ProLiant DL380 Gen10', status: 'Baik'},
        {id: 29, tag: 'SRV-003', name: 'Server Lenovo ThinkSystem SR650', status: 'Baik'},
        {id: 30, tag: 'SRV-004', name: 'Server Cisco UCS C220 M5', status: 'Rusak Ringan'},
        {id: 31, tag: 'SRV-005', name: 'Server Supermicro SYS-5019S-M', status: 'Baik'},
        {id: 32, tag: 'SRV-006', name: 'NAS Synology DS920+', status: 'Baik'},
        {id: 33, tag: 'SRV-007', name: 'Server Fujitsu PRIMERGY RX1330 M5', status: 'Baik'},
        {id: 34, tag: 'SRV-008', name: 'Server IBM System x3550 M5', status: 'Baik'}
    ]
};

function showAssetDropdown() {
    const categoryId = document.getElementById('category_id').value;
    const assetSelect = document.getElementById('asset_id');
    const assetGroup = document.getElementById('asset_group');
    
    // Reset dropdown aset
    assetSelect.innerHTML = '<option value="">-- Pilih Aset --</option>';
    
    if (categoryId && staticAssets[categoryId]) {
        // Tampilkan group aset
        assetGroup.style.display = 'block';
        
        // Tambahkan opsi aset dari static data
        staticAssets[categoryId].forEach(asset => {
            const option = document.createElement('option');
            option.value = asset.id;
            
            let statusIcon = '';
            if (asset.status !== 'Baik') {
                statusIcon = ' (⚠️ ' + asset.status + ')';
            }
            
            option.textContent = '[' + asset.tag + '] ' + asset.name + statusIcon;
            assetSelect.appendChild(option);
        });
    } else {
        // Sembunyikan jika tidak ada kategori yang dipilih
        assetGroup.style.display = 'none';
    }
}

// Auto-load jika ada category_id yang terpilih (untuk edit/validation)
document.addEventListener('DOMContentLoaded', function() {
    const categoryId = document.getElementById('category_id').value;
    if (categoryId) {
        showAssetDropdown();
        
        // Set selected asset jika ada old value
        const selectedAssetId = '{{ old('asset_id') }}';
        if (selectedAssetId) {
            document.getElementById('asset_id').value = selectedAssetId;
        }
    }
});
</script>

</x-app-layout>