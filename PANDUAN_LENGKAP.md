# 📘 PANDUAN LENGKAP - SIM-TIK Dashboard Modern

## 🎯 Daftar Isi
1. [Pengenalan](#pengenalan)
2. [Akun Demo](#akun-demo)
3. [Dashboard Admin](#dashboard-admin)
4. [Dashboard User](#dashboard-user)
5. [Dashboard Technician](#dashboard-technician)
6. [Animasi Cyber](#animasi-cyber)
7. [Troubleshooting](#troubleshooting)

---

## 🌟 Pengenalan

SIM-TIK Dashboard adalah sistem modern untuk manajemen aset TIK dengan:
- ✅ 3 dashboard berbeda per role
- ✅ Animasi cyber yang sophisticated
- ✅ Dark mode support
- ✅ Responsive design
- ✅ Form cepat untuk quick action

---

## 🔐 Akun Demo

### Cara Login:
1. Buka URL: `http://localhost/sim-tik/login`
2. Pilih salah satu akun di bawah
3. Password semua akun: `password`

### Akun Tersedia:

#### 👨‍💼 ADMINISTRATOR
```
Email: admin@simtik.com
Password: password
Akses: Penuh (Full Access)
```
**Fitur:**
- Melihat seluruh sistem
- Manajemen Aset (Create, Read, Update, Delete)
- Manajemen Kategori
- Manajemen User (Admin, Technician, User)
- Dashboard dengan 6 statistik utama
- Form cepat untuk menambah data

#### 👤 USER / PELAPOR
```
Email: user@simtik.com
Password: password
Akses: Terbatas (Report Creator)
```
**Fitur:**
- Membuat laporan kerusakan baru
- Melihat laporan yang telah dibuat
- Tracking status laporan
- Dashboard dengan 4 statistik laporan

#### 🔧 TECHNICIAN
```
Email: teknisi@simtik.com
Password: password
Akses: Teknis (Repair Handler)
```
**Fitur:**
- Melihat daftar tiket yang ditugaskan
- Update status tiket
- Menambah catatan perbaikan
- Dashboard dengan performa penyelesaian
- Filter tiket berdasarkan status

---

## 🏢 Dashboard Admin

### Layout Umum:
```
┌─────────────────────────────────────────────────────┐
│ Header dengan tanggal dan waktu                      │
├─────────────────────────────────────────────────────┤
│ STATISTIK UTAMA (4 Cards)                           │
│ ├─ Total Aset (Blue)                                │
│ ├─ Total Tiket (Green)                              │
│ ├─ Tiket Pending (Amber)                            │
│ └─ Tiket Processing (Purple)                        │
├─────────────────────────────────────────────────────┤
│ AKSES CEPAT MENU (3 Cards)                          │
│ ├─ Manajemen Aset                                   │
│ ├─ Manajemen Kategori                               │
│ └─ Manajemen User                                   │
├─────────────────────────────────────────────────────┤
│ PERFORMA SISTEM (2 Cards)                           │
│ ├─ Tiket Selesai                                    │
│ └─ Total Technician                                 │
├─────────────────────────────────────────────────────┤
│ FORM CEPAT (3 Forms)                                │
│ ├─ Form Tambah Aset                                 │
│ ├─ Form Tambah User                                 │
│ └─ Form Tambah Kategori                             │
└─────────────────────────────────────────────────────┘
```

### Cara Menggunakan:

#### 1. Melihat Statistik
- Statistik secara otomatis terhitung dari database
- Setiap card menampilkan nilai real-time
- Hover pada card untuk melihat efek lifting

#### 2. Akses Menu Manajemen
- Klik card "Manajemen Aset" untuk pergi ke halaman aset
- Klik "Manajemen Kategori" untuk manage kategori
- Klik "Manajemen User" untuk manage pengguna

#### 3. Gunakan Form Cepat
```
Form Tambah Aset:
1. Input Tag Aset (contoh: IT-L-001)
2. Input Nama Aset (contoh: Laptop Dell)
3. Pilih Kategori dari dropdown
4. Pilih Status (Baik, Rusak Ringan, Rusak Berat, Afkir)
5. Input Lokasi (contoh: Ruang IT)
6. Klik "Simpan Aset"

Form Tambah User:
1. Input Nama User
2. Input Email
3. Input Password
4. Pilih Role (Admin, Technician, User)
5. Pilih Divisi
6. Klik "Simpan User"

Form Tambah Kategori:
1. Input Nama Kategori
2. Klik "Simpan Kategori"
```

#### 4. Tips Penggunaan
- Gunakan form cepat untuk penambahan data cepat
- Untuk edit/hapus data, gunakan menu manajemen penuh
- Monitor statistik untuk health check sistem

---

## 👤 Dashboard User

### Layout Umum:
```
┌─────────────────────────────────────────────────────┐
│ Header dengan salam personal                         │
├─────────────────────────────────────────────────────┤
│ STATISTIK LAPORAN (4 Cards)                         │
│ ├─ Total Laporan (Blue)                             │
│ ├─ Status Pending (Amber)                           │
│ ├─ Sedang Dikerjakan (Purple)                       │
│ └─ Terselesaikan (Green)                            │
├─────────────────────────────────────────────────────┤
│ AKSI CEPAT (2 Cards)                                │
│ ├─ Buat Laporan Baru                                │
│ └─ Semua Laporan                                    │
├─────────────────────────────────────────────────────┤
│ TIPS & INFO (2 Banners)                             │
│ ├─ Tips Membuat Laporan                             │
│ └─ Penjelasan Status Laporan                        │
└─────────────────────────────────────────────────────┘
```

### Cara Menggunakan:

#### 1. Membuat Laporan Baru
```
Klik "Buat Laporan Baru" → Isi Form:
1. Pilih Kategori (Komputer, Jaringan, Printer, Server)
2. Input Judul/Subjek Laporan
3. Jelaskan Detail Masalah
4. Sebutkan Lokasi Perangkat
5. Pilih Prioritas (Low, Medium, High)
6. Klik Kirim
```

#### 2. Tracking Laporan
- Klik "Semua Laporan" untuk melihat daftar
- Lihat status setiap laporan (Pending, Processing, Done)
- Hover pada status untuk melihat detail
- Klik laporan untuk melihat progres perbaikan

#### 3. Memahami Status
- **⏳ Pending**: Menunggu teknisi memproses
- **⚙️ Processing**: Sedang dalam perbaikan
- **✅ Done**: Perbaikan sudah selesai

#### 4. Tips Membuat Laporan Efektif
- Jelaskan masalah dengan detail dan spesifik
- Sebutkan nama perangkat/aset yang bermasalah
- Cantumkan lokasi perangkat dengan jelas
- Semakin detail laporan, semakin cepat penyelesaian

---

## 🔧 Dashboard Technician

### Layout Umum:
```
┌─────────────────────────────────────────────────────┐
│ Header dengan motivasi                              │
├─────────────────────────────────────────────────────┤
│ TUGAS SAYA (4 Cards)                                │
│ ├─ Total Tiket Ditugaskan (Blue)                    │
│ ├─ Pending/Belum Dimulai (Amber)                    │
│ ├─ Sedang Dikerjakan (Orange)                       │
│ └─ Perbaikan Selesai (Green)                        │
├─────────────────────────────────────────────────────┤
│ MENU UTAMA (3 Cards)                                │
│ ├─ Lihat Semua Tiket                                │
│ ├─ Tiket Pending                                    │
│ └─ Sedang Dikerjakan                                │
├─────────────────────────────────────────────────────┤
│ PERFORMA & TIPS                                     │
│ ├─ Tips Perbaikan                                   │
│ └─ Performa Anda (Completion Rate)                  │
└─────────────────────────────────────────────────────┘
```

### Cara Menggunakan:

#### 1. Melihat Tiket Ditugaskan
- Semua tiket yang ditugaskan akan terlihat
- Tiket pending ditandai dengan icon ⏳
- Tiket processing ditandai dengan icon 🔧
- Tiket selesai ditandai dengan icon ✅

#### 2. Update Status Tiket
```
Workflow Tiket:
1. Pending → Mulai perbaikan, ubah ke Processing
2. Processing → Tambahkan catatan perbaikan
3. Processing → Perbaikan selesai, ubah ke Done
```

#### 3. Gunakan Menu Filter
- Klik "Lihat Semua Tiket" untuk melihat semua
- Klik "Tiket Pending" untuk filter pending only
- Klik "Sedang Dikerjakan" untuk progress update

#### 4. Tracking Performa
- Dashboard menampilkan persentase penyelesaian
- Formula: (Tiket Selesai / Total Tiket) × 100%
- Contoh: 8 selesai dari 10 total = 80%

#### 5. Tips Perbaikan Efektif
- ✓ Prioritaskan tiket pending terlebih dahulu
- ✓ Update status tiket secara berkala
- ✓ Berikan catatan detail untuk setiap progres
- ✓ Konfirmasi ketika perbaikan selesai
- ✓ Catat waktu penyelesaian untuk evaluasi

---

## 🎨 Animasi Cyber

### Tipe Animasi yang Digunakan:

#### 1. **FadeInDown** (Header)
- Duration: 0.8 detik
- Effect: Bounce easing dengan cubic-bezier
- Digunakan pada: Judul halaman

#### 2. **FadeInUp** (Statistik Cards)
- Duration: 0.6 detik
- Effect: Ease-out
- Staggered Delay: 0.1s, 0.2s, 0.3s, 0.4s
- Digunakan pada: Semua statistik cards

#### 3. **SlideInLeft** (Action Cards)
- Duration: 0.7 detik
- Effect: Ease-out
- Staggered Delay: 0.5s, 0.6s, 0.7s
- Digunakan pada: Menu cards, action buttons

#### 4. **Float** (Icons)
- Duration: 3 detik infinite
- Effect: Smooth floating up/down 10px
- Digunakan pada: Semua icons
- On Hover: Accelerates ke 1.5 detik

#### 5. **Pulse-Subtle** (Status Indicators)
- Duration: 2 detik infinite
- Effect: Opacity fade in/out
- Digunakan pada: Status dots

#### 6. **Glow-Pulse** (Underlines)
- Duration: 2 detik infinite
- Effect: Box shadow glow effect
- Digunakan pada: Section underlines, accents

#### 7. **Data-Flow** (Cyber Lines)
- Duration: 2 detik infinite
- Effect: Horizontal scan lines
- Digunakan pada: Top of every card

### Hover Effects:

```css
Hover pada Card:
- Lift Up: translateY(-8px)
- Shadow: Meningkat dari 0 menjadi 50px
- Transition: Smooth 0.3s

Hover pada Icons:
- Scale: +110%
- Float Animation: Dipercepat menjadi 1.5s

Hover pada Buttons:
- Scale: +105%
- Shadow: Meningkat
```

---

## 🌙 Dark Mode

### Cara Mengaktifkan:
1. Sistem otomatis mengikuti preferensi OS
2. Atau gunakan toggle dark mode di interface
3. Semua warna otomatis adjust untuk dark mode

### Warna Dark Mode:
- Background: #111827 (gray-900)
- Card: #1f2937 (gray-800)
- Text: #e2e8f0 (slate-100)
- Borders: rgba(59, 130, 246, 0.2) dengan alpha transparency

---

## 📱 Responsive Design

### Breakpoints:
```
Mobile (< 768px):
- Grid: 1 column
- Font: Smaller sizes
- Padding: Reduced

Tablet (768px - 1024px):
- Grid: 2 columns
- Font: Medium sizes
- Padding: Normal

Desktop (> 1024px):
- Grid: 3-4 columns
- Font: Full sizes
- Padding: Full
```

### Mobile Tips:
- Scroll untuk melihat semua cards
- Tap pada card untuk interaksi
- Form responsive dengan touch-friendly buttons
- Menu dapat diakses dengan touch/click

---

## ⚡ Performance Tips

### Tips Optimization:
1. **Browser Caching**: Clear cache jika ada perubahan CSS
2. **Network**: Pastikan koneksi stabil untuk animasi smooth
3. **Device**: Animasi berjalan optimal di device modern
4. **Dark Mode**: Dark mode mengurangi eye strain

### Supported Browsers:
- ✅ Chrome 60+
- ✅ Firefox 55+
- ✅ Safari 12+
- ✅ Edge 79+

---

## 🐛 Troubleshooting

### Masalah: Animasi tidak berjalan
**Solusi:**
1. Refresh halaman (Ctrl+R / Cmd+R)
2. Clear cache browser
3. Cek browser compatibility
4. Disable browser extensions

### Masalah: Dashboard tampil kosong
**Solusi:**
1. Pastikan sudah login
2. Cek role user di database
3. Refresh halaman
4. Cek console untuk error

### Masalah: Form tidak submit
**Solusi:**
1. Pastikan semua field terisi
2. Cek validasi field
3. Pastikan CSRF token ada
4. Cek network error di console

### Masalah: Dark mode tidak work
**Solusi:**
1. Cek OS preference (Settings)
2. Refresh halaman
3. Clear browser cache
4. Update browser

### Masalah: Animasi terasa lambat
**Solusi:**
1. Close background apps
2. Update browser
3. Disable browser extensions
4. Cek disk space

---

## 📞 Support

### Jika Ada Masalah:
1. Check dashboard preview: `/dashboard-preview.html`
2. Read documentation: `/DASHBOARD_SUMMARY.md`
3. Check browser console for errors
4. Verify database connection
5. Contact system administrator

---

## 📝 File Reference

### Login Page:
- Location: `resources/views/auth/login.blade.php`
- Features: Akun demo display, form validation

### Dashboard Files:
- Admin: `resources/views/admin/dashboard.blade.php`
- User: `resources/views/user/dashboard.blade.php`
- Technician: `resources/views/technician/dashboard.blade.php`

### Controller:
- `app/Http/Controllers/DashboardController.php` (Main routing)

### Preview:
- HTML Preview: `public/dashboard-preview.html`

---

## 🎓 Learning Resources

### CSS Animations:
- `@keyframes` untuk custom animations
- `animation` property untuk apply
- `transition` untuk smooth effects

### Tailwind CSS:
- Utility classes untuk styling
- Dark mode dengan `dark:` prefix
- Responsive dengan `md:` dan `lg:` prefix

### Laravel Blade:
- `{{ }}` untuk echo data
- `@if` untuk conditional
- `@foreach` untuk looping
- `@csrf` untuk security

---

## ✅ Checklist Penggunaan

- [ ] Sudah test login dengan 3 akun
- [ ] Sudah explore dashboard admin
- [ ] Sudah explore dashboard user
- [ ] Sudah explore dashboard technician
- [ ] Sudah coba buat laporan (user)
- [ ] Sudah coba update tiket (technician)
- [ ] Sudah coba form cepat (admin)
- [ ] Sudah test dark mode
- [ ] Sudah test responsive di mobile
- [ ] Sudah lihat semua animasi

---

**Dibuat**: November 2025
**Versi**: 2.0 (Modern Edition)
**Status**: ✅ Production Ready

