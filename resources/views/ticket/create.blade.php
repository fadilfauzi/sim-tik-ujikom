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
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-15px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes floatIn {
        from { opacity: 0; transform: translateY(15px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .form-container { animation: fadeInUp 0.6s ease-out; }
    .form-group { animation: slideInLeft 0.5s ease-out forwards; opacity: 0; }
    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .button-group { animation: floatIn 0.6s ease-out 0.4s forwards; opacity: 0; }

    .modern-input, .modern-select, .modern-textarea {
        width: 100%;
        padding: 0.875rem 1rem;
        background-color: #f9fafb;
        border: 2px solid #e5e7eb;
        border-radius: 0.75rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .modern-input:focus, .modern-select:focus, .modern-textarea:focus {
        outline: none;
        border-color: #f59e0b;
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15);
    }

    .dark .modern-input, .dark .modern-select, .dark .modern-textarea {
        background-color: #1f2937;
        border-color: #374151;
        color: #f3f4f6;
    }

    .modern-textarea { resize: vertical; min-height: 120px; }

    .form-label {
        display: block;
        font-weight: 600;
        font-size: 0.875rem;
        color: #1f2937;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
    }

    .dark .form-label { color: #e5e7eb; }

    .error-message { color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem; }

    .modern-btn {
        padding: 0.875rem 2rem;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }

    .modern-btn:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 15px 35px rgba(245, 158, 11, 0.4);
    }

    .cancel-link {
        padding: 0.875rem 2rem;
        background-color: #e5e7eb;
        color: #1f2937;
        border-radius: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        transition: all 0.3s ease;
    }

    .cancel-link:hover { background-color: #d1d5db; }

    .upload-box {
        border: 2px dashed #d1d5db;
        border-radius: 0.75rem;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background-color: #f9fafb;
    }

    .upload-box:hover {
        border-color: #f59e0b;
        background-color: #fef3c7;
    }

    .upload-box.dragover {
        border-color: #f59e0b;
        background-color: #fef3c7;
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15);
    }

    .dark .upload-box {
        background-color: #1f2937;
        border-color: #374151;
    }

    .dark .upload-box:hover {
        border-color: #fbbf24;
        background-color: #5d4e37;
    }

    .dark .upload-box.dragover {
        border-color: #fbbf24;
        background-color: #5d4e37;
        box-shadow: 0 0 0 4px rgba(251, 191, 36, 0.15);
    }

    .hidden {
        display: none !important;
    }
</style>

<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="form-container bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl p-6 sm:p-8">
            <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Judul Laporan -->
                <div class="form-group">
                    <label for="subject" class="form-label">Judul Laporan <span class="text-red-500">*</span></label>
                    <input id="subject" class="modern-input" type="text" name="subject" value="{{ old('subject') }}" placeholder="Contoh: Laptop tidak bisa start" required />
                    @error('subject') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <!-- Kategori Aset -->
                <div class="form-group">
                    <label for="category_id" class="form-label">Kategori Aset <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id" class="modern-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <!-- Prioritas -->
                <div class="form-group">
                    <label for="priority" class="form-label">Prioritas <span class="text-red-500">*</span></label>
                    <select name="priority" id="priority" class="modern-select" required>
                        <option value="">-- Pilih Prioritas --</option>
                        <option value="Low">🟢 Rendah</option>
                        <option value="Medium">🟡 Sedang</option>
                        <option value="High">🔴 Tinggi</option>
                    </select>
                    @error('priority') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <!-- Aset -->
                <div class="form-group">
                    <label for="asset_id" class="form-label">Nama & Nomor Aset (Opsional)</label>
                    <select name="asset_id" id="asset_id" class="modern-select">
                        <option value="">-- Pilih Aset --</option>
                        @foreach($assets as $asset)
                            <option value="{{ $asset->id }}" data-category="{{ $asset->category_id }}">[{{ $asset->asset_tag }}] {{ $asset->name }}</option>
                        @endforeach
                    </select>
                    @error('asset_id') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <!-- Deskripsi -->
                <div class="form-group">
                    <label for="description" class="form-label">Deskripsi Detail <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" class="modern-textarea" required placeholder="Jelaskan masalah secara detail...">{{ old('description') }}</textarea>
                    @error('description') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <!-- Upload Gambar -->
                <div class="form-group">
                    <label for="image" class="form-label">Upload Foto (Opsional)</label>
                    <div id="upload-box" class="upload-box" ondrop="handleDrop(event)" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" onclick="document.getElementById('image').click()" style="cursor: pointer;">
                        <input type="file" id="image" name="image" class="hidden" accept="image/*" onchange="handleFileSelect(event)" />
                        <div id="upload-content">
                            <div class="text-4xl mb-2">📸</div>
                            <p class="text-gray-700 dark:text-gray-300 font-medium">Seret foto di sini atau <span class="text-amber-600 font-bold">klik untuk memilih</span></p>
                            <p class="text-gray-500 text-sm mt-2">Maksimal 5MB (JPG, PNG, GIF, WebP)</p>
                        </div>
                    </div>
                    
                    <div id="preview-container" class="mt-4 hidden">
                        <div class="relative inline-block">
                            <img id="preview" class="max-w-full h-auto rounded-lg shadow-lg max-h-64" alt="Preview" />
                            <button type="button" onclick="removeImage()" class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg">✕</button>
                        </div>
                        <p id="file-name" class="text-sm text-gray-600 mt-2 text-center"></p>
                    </div>
                    
                    @error('image') <div class="error-message">{{ $message }}</div> @enderror
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <button type="submit" class="modern-btn">✓ Kirim Laporan</button>
                    <a href="{{ route('dashboard') }}" class="cancel-link">✕ Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Filter aset berdasarkan kategori
document.getElementById('category_id').addEventListener('change', function() {
    const categoryId = this.value;
    const assetSelect = document.getElementById('asset_id');
    const options = assetSelect.querySelectorAll('option');
    
    // Reset ke pilihan pertama
    assetSelect.value = '';
    
    options.forEach(option => {
        if (option.value === '') {
            option.style.display = '';
        } else {
            const optionCategory = option.getAttribute('data-category');
            if (categoryId && optionCategory === categoryId) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        }
    });
});

function handleDragOver(event) {
    event.preventDefault();
    event.stopPropagation();
    const uploadBox = document.getElementById('upload-box');
    if (uploadBox) {
        uploadBox.classList.add('dragover');
    }
}

function handleDragLeave(event) {
    event.preventDefault();
    event.stopPropagation();
    const uploadBox = document.getElementById('upload-box');
    if (uploadBox) {
        uploadBox.classList.remove('dragover');
    }
}

function handleDrop(event) {
    event.preventDefault();
    event.stopPropagation();
    document.getElementById('upload-box').classList.remove('dragover');
    
    const files = event.dataTransfer.files;
    if (files.length > 0) {
        // Assign files ke input
        const fileInput = document.getElementById('image');
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(files[0]);
        fileInput.files = dataTransfer.files;
        
        // Trigger onchange
        handleFileSelect({target: {files: files}});
    }
}

function handleFileSelect(event) {
    const file = event.target.files[0];
    if (!file) {
        console.log('Tidak ada file dipilih');
        return;
    }
    
    console.log('File dipilih:', file.name, 'Type:', file.type, 'Size:', file.size);
    
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!allowedTypes.includes(file.type)) {
        alert('❌ Format file tidak didukung. Gunakan: JPG, PNG, GIF, atau WebP');
        document.getElementById('image').value = '';
        return;
    }
    
    const maxSize = 5 * 1024 * 1024; // 5MB
    if (file.size > maxSize) {
        alert('❌ Ukuran file terlalu besar. Maksimal 5MB. File Anda: ' + (file.size / 1024 / 1024).toFixed(2) + 'MB');
        document.getElementById('image').value = '';
        return;
    }
    
    // Baca file dan tampilkan preview
    const reader = new FileReader();
    reader.onload = function(e) {
        console.log('Preview berhasil dimuat');
        document.getElementById('preview').src = e.target.result;
        document.getElementById('file-name').textContent = '✓ ' + file.name + ' (' + (file.size / 1024).toFixed(2) + ' KB)';
        document.getElementById('upload-content').classList.add('hidden');
        document.getElementById('preview-container').classList.remove('hidden');
    };
    reader.onerror = function() {
        alert('Gagal membaca file');
    };
    reader.readAsDataURL(file);
}

function removeImage() {
    console.log('Menghapus gambar');
    document.getElementById('image').value = '';
    document.getElementById('preview').src = '';
    document.getElementById('file-name').textContent = '';
    document.getElementById('upload-content').classList.remove('hidden');
    document.getElementById('preview-container').classList.add('hidden');
}
</script>

</x-app-layout>
