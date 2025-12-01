# 🎨 Design System & Component Guide - SIM-TIK Admin

## 📐 Component Architecture

### 1. Header Card Component
**Usage**: Displays summary statistics with action button

```blade
<div class="header-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div>
            <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Aset</p>
            <p class="text-4xl font-bold text-gray-900 dark:text-white mt-1">{{ $assets->total() }}</p>
        </div>
        <a href="{{ route('admin.assets.create') }}" class="btn-primary">
            <span>➕</span>
            <span>Tambah Aset Baru</span>
        </a>
    </div>
</div>
```

**CSS**
```css
.header-card {
    animation: slideDown 0.5s ease-out;
}
```

---

### 2. Asset Card Component
**Usage**: Displays individual asset details in grid layout

```blade
<div class="asset-card bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl 
            overflow-hidden border border-gray-200 dark:border-gray-700">
    <!-- Card Header -->
    <div class="p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="flex-1">
                <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                    {{ $asset->asset_tag }}
                </p>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mt-2">
                    {{ $asset->name }}
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    📁 {{ $asset->category->name }}
                </p>
            </div>
            <span class="status-badge status-{{ Str::slug($asset->status) }}">
                ✓ {{ $asset->status }}
            </span>
        </div>

        <!-- Details Grid -->
        <div class="grid grid-cols-2 gap-4 py-4 border-t border-gray-200 dark:border-gray-700">
            <div>
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Lokasi</p>
                <p class="text-sm font-semibold text-gray-900 dark:text-white">
                    {{ $asset->location ?? '-' }}
                </p>
            </div>
            <div>
                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Serial</p>
                <p class="text-sm font-semibold text-gray-900 dark:text-white">
                    {{ $asset->serial_number ?? '-' }}
                </p>
            </div>
        </div>
    </div>

    <!-- Card Footer -->
    <div class="px-6 py-3 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 
                dark:border-gray-700 flex gap-2">
        <a href="{{ route('admin.assets.edit', $asset) }}" class="action-btn action-btn-edit flex-1 justify-center">
            <span>✏️</span>
            <span>Edit</span>
        </a>
        <form action="{{ route('admin.assets.destroy', $asset) }}" method="POST" class="flex-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn action-btn-delete w-full justify-center" 
                    onclick="return confirm('Hapus aset?');">
                <span>🗑️</span>
                <span>Hapus</span>
            </button>
        </form>
    </div>
</div>
```

**CSS**
```css
.asset-card {
    animation: fadeIn 0.6s ease-out forwards;
    opacity: 0;
}

.asset-card:nth-child(n) {
    animation-delay: 0.1s * n;
}

.asset-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
}
```

---

### 3. Status Badge Component
**Usage**: Displays asset status with color coding

```blade
<span class="status-badge status-{{ Str::slug($asset->status) }}">
    @if($asset->status == 'Baik') ✓ Baik
    @elseif($asset->status == 'Rusak Ringan') ⚠ Ringan
    @elseif($asset->status == 'Rusak Berat') ❌ Berat
    @else 🚫 Afkir @endif
</span>
```

**CSS**
```css
.status-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    transition: all 0.3s ease;
}

.status-baik {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.status-ringan {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
}

.status-berat {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.status-afkir {
    background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
    color: white;
}
```

---

### 4. User Avatar Component
**Usage**: Displays user with avatar and role badge

```blade
<div class="user-item bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md overflow-hidden 
            border border-gray-200 dark:border-gray-700">
    <div class="p-4 flex items-center gap-4">
        <!-- Avatar -->
        <div class="flex-shrink-0">
            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full 
                        flex items-center justify-center">
                <span class="text-white font-bold text-lg">
                    {{ substr($user->name, 0, 1) }}
                </span>
            </div>
        </div>

        <!-- User Info -->
        <div class="flex-grow">
            <p class="font-semibold text-gray-900 dark:text-white">{{ $user->name }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
            <div class="flex items-center gap-2 mt-2">
                <span class="role-badge role-{{ $user->role }}">
                    @if($user->role == 'admin') 🔴 Admin
                    @elseif($user->role == 'technician') 🔵 Technician
                    @else 🟢 User @endif
                </span>
                @if($user->division)
                    <span class="text-xs bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded">
                        {{ $user->division->name }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
```

**CSS**
```css
.role-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 0.375rem;
    font-size: 0.75rem;
    font-weight: 600;
}

.role-admin {
    background-color: #fee2e2;
    color: #991b1b;
}

.role-technician {
    background-color: #dbeafe;
    color: #1e40af;
}

.role-user {
    background-color: #dcfce7;
    color: #166534;
}
```

---

### 5. Empty State Component
**Usage**: Displays when no data available

```blade
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-12 empty-state">
    <div class="empty-state-icon">📭</div>
    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
        Belum Ada Aset
    </h3>
    <p class="text-gray-600 dark:text-gray-400 mb-6">
        Mulai dengan menambahkan aset pertama Anda ke sistem
    </p>
    <a href="{{ route('admin.assets.create') }}" class="btn-primary">
        <span>➕</span>
        <span>Tambah Aset Pertama</span>
    </a>
</div>
```

**CSS**
```css
.empty-state {
    text-align: center;
    padding: 3rem 1rem;
}

.empty-state-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
}
```

---

### 6. Action Button Component
**Usage**: Edit and Delete buttons

```blade
<!-- Edit Button -->
<a href="{{ route('admin.assets.edit', $asset) }}" class="action-btn action-btn-edit">
    <span>✏️</span>
    <span>Edit</span>
</a>

<!-- Delete Button -->
<form action="{{ route('admin.assets.destroy', $asset) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="action-btn action-btn-delete"
            onclick="return confirm('Yakin ingin menghapus?');">
        <span>🗑️</span>
        <span>Hapus</span>
    </button>
</form>
```

**CSS**
```css
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
    border: none;
    cursor: pointer;
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
```

---

## 🎬 Animation Library

### Keyframe Definitions

```css
/* Slide Down Animation */
@keyframes slideDown {
    from { 
        opacity: 0; 
        transform: translateY(-10px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

/* Fade In Animation */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Scale In Animation */
@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Slide In Left Animation */
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

/* Fade In Up Animation */
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
```

### Stagger Animation Implementation

```css
/* For 5 items */
.item:nth-child(1) { animation-delay: 0.1s; }
.item:nth-child(2) { animation-delay: 0.2s; }
.item:nth-child(3) { animation-delay: 0.3s; }
.item:nth-child(4) { animation-delay: 0.4s; }
.item:nth-child(5) { animation-delay: 0.5s; }
```

### Hover Animations

```css
.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
}

.button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}
```

---

## 🎨 Color Palette

### Primary Colors
- **Blue**: `#3b82f6` (Main brand color)
- **Purple**: `#8b5cf6` (Accent)
- **Pink**: `#ec4899` (Secondary accent)

### Status Colors
- **Success (Green)**: `#10b981`
- **Warning (Yellow)**: `#f59e0b`
- **Error (Red)**: `#ef4444`
- **Neutral (Gray)**: `#6b7280`

### Dark Mode Colors
- **Background**: `#111827` (gray-900)
- **Card Background**: `#1f2937` (gray-800)
- **Text Primary**: `#f3f4f6` (gray-100)
- **Text Secondary**: `#9ca3af` (gray-400)

---

## 📐 Typography Scale

```css
/* Headings */
h1 { @apply text-4xl font-bold; }          /* 36px */
h2 { @apply text-3xl font-bold; }          /* 30px */
h3 { @apply text-2xl font-bold; }          /* 24px */
h4 { @apply text-xl font-bold; }           /* 20px */

/* Body */
p { @apply text-base; }                    /* 16px */
small { @apply text-sm; }                  /* 14px */
.text-xs { @apply text-xs; }               /* 12px */

/* Font Weights */
.font-light   { font-weight: 300; }
.font-normal  { font-weight: 400; }
.font-semibold { font-weight: 600; }
.font-bold    { font-weight: 700; }
```

---

## 📱 Responsive Breakpoints

```css
/* Mobile First */
.grid-cols-1          /* Default: 1 column */
@lg .grid-cols-2      /* Large: 2 columns (1024px) */

/* Text Sizing */
.text-sm md:text-base /* Adjust on medium+ */
.px-4 md:px-6         /* Padding adjustment */

/* Flex Direction */
.flex-col sm:flex-row /* Stack on mobile, row on small+ */
```

---

## ✅ Best Practices

### 1. Accessibility
- ✅ Proper contrast ratios (WCAG AA compliant)
- ✅ Semantic HTML (`<button>`, `<form>`, etc.)
- ✅ Aria labels for icons
- ✅ Keyboard navigation support

### 2. Performance
- ✅ GPU accelerated animations (transform, opacity)
- ✅ Minimal repaints
- ✅ Lazy loading for images
- ✅ Optimized CSS selectors

### 3. Maintainability
- ✅ Reusable component patterns
- ✅ Clear class naming conventions
- ✅ Inline styles for isolated animations
- ✅ Comments for complex logic

---

## 🚀 Usage Examples

### Assets Index Page
```blade
@foreach ($assets as $asset)
    <!-- Asset card renders here with animations -->
    <div class="asset-card"><!-- ... --></div>
@endforeach
```

### Categories Index Page
```blade
@foreach ($categories as $category)
    <!-- Category item renders here -->
    <div class="category-item"><!-- ... --></div>
@endforeach
```

### Users Index Page
```blade
@foreach ($users as $user)
    <!-- User item with avatar renders -->
    <div class="user-item"><!-- ... --></div>
@endforeach
```

---

## 📚 Component File References

- **Assets Index**: `resources/views/admin/assets/index_new.blade.php`
- **Categories Index**: `resources/views/admin/categories/index_new.blade.php`
- **Users Index**: `resources/views/admin/users/index_new.blade.php`
- **Assets Create**: `resources/views/admin/assets/create.blade.php`
- **Categories Create**: `resources/views/admin/categories/create.blade.php`
- **Users Create**: `resources/views/admin/users/create.blade.php`

---

*Design System v1.0 - 2024*
