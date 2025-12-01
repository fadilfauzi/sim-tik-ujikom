# ✅ TESTING CHECKLIST - SIM-TIK v1.0.0

**Date:** 29 November 2025  
**Status:** FINAL TESTING - HARI 3 PART 2

---

## 🧪 TEST PLAN

### SECTION 1: AUTHENTICATION & AUTHORIZATION

#### Test 1.1: User Registration
- [ ] Akses halaman `/register`
- [ ] Isi form dengan data valid
- [ ] Submit form
- [ ] Verifikasi user baru dibuat
- [ ] Email verification dapat diakses

#### Test 1.2: User Login (Admin)
- [ ] Akses halaman `/login`
- [ ] Masukkan: `admin@simtik.com` / `password`
- [ ] Klik login
- [ ] Redirect ke `/admin/dashboard`
- [ ] Menu admin terlihat

#### Test 1.3: User Login (Technician)
- [ ] Logout jika sedang login
- [ ] Login dengan: `teknisi@simtik.com` / `password`
- [ ] Redirect ke `/dashboard` (technician view)
- [ ] Hanya lihat menu technician

#### Test 1.4: User Login (User/Pelapor)
- [ ] Logout jika sedang login
- [ ] Login dengan: `user@simtik.com` / `password`
- [ ] Redirect ke `/dashboard` (user view)
- [ ] Button "Buat Laporan Baru" terlihat

#### Test 1.5: Access Control - Admin Pages
- [ ] Login sebagai User biasa
- [ ] Coba akses `/admin/users` (direct URL)
- [ ] Verifikasi: Cannot access (redirect atau 403)

#### Test 1.6: Access Control - User Pages
- [ ] Login sebagai Admin
- [ ] Coba akses `/lapor` (hanya user)
- [ ] Verifikasi: Hanya user yang bisa akses

#### Test 1.7: Logout
- [ ] Login dengan akun apapun
- [ ] Klik logout
- [ ] Redirect ke halaman login
- [ ] Verifikasi: User tidak bisa akses dashboard tanpa login

---

### SECTION 2: ASSET MANAGEMENT

#### Test 2.1: View Asset List (Admin)
- [ ] Login sebagai admin
- [ ] Akses `/admin/assets`
- [ ] Verifikasi: Daftar aset ditampilkan
- [ ] Pagination berfungsi

#### Test 2.2: Create Asset
- [ ] Klik "Tambah Aset"
- [ ] Isi semua field required:
  - [ ] Asset Tag: `IT-L-001`
  - [ ] Nama: `Laptop Dell`
  - [ ] Kategori: `Komputer & Laptop`
  - [ ] Status: `Baik`
  - [ ] Serial Number: `ABC123`
  - [ ] Lokasi: `Ruang Kepala`
  - [ ] Tanggal Pembelian: `2025-01-15`
- [ ] Submit
- [ ] Verifikasi: Aset baru muncul di list

#### Test 2.3: View Asset Detail
- [ ] Klik tombol View/Detail di asset
- [ ] Verifikasi: Semua detail ditampilkan dengan benar
- [ ] Category relationship bekerja

#### Test 2.4: Edit Asset
- [ ] Klik tombol Edit
- [ ] Ubah satu field (misal: Status menjadi "Rusak Ringan")
- [ ] Submit
- [ ] Verifikasi: Perubahan tersimpan
- [ ] Redirect ke list asset

#### Test 2.5: Delete Asset
- [ ] Pilih satu aset
- [ ] Klik tombol Delete
- [ ] Verifikasi: Confirmation dialog muncul
- [ ] Klik confirm
- [ ] Verifikasi: Aset dihapus dari list

#### Test 2.6: Asset Filter by Category
- [ ] Di halaman asset list
- [ ] Filter/cari berdasarkan kategori
- [ ] Verifikasi: Hanya aset dengan kategori terpilih yang ditampilkan

---

### SECTION 3: CATEGORY MANAGEMENT

#### Test 3.1: View Category List
- [ ] Login sebagai admin
- [ ] Akses `/admin/categories`
- [ ] Verifikasi: Daftar kategori ditampilkan

#### Test 3.2: Create Category
- [ ] Klik "Tambah Kategori"
- [ ] Isi: `Perangkat Jaringan`
- [ ] Submit
- [ ] Verifikasi: Kategori baru muncul di list

#### Test 3.3: Edit Category
- [ ] Klik Edit pada kategori
- [ ] Ubah nama kategori
- [ ] Submit
- [ ] Verifikasi: Perubahan tersimpan

#### Test 3.4: Delete Category
- [ ] Pilih kategori yang tidak memiliki aset
- [ ] Klik Delete
- [ ] Verifikasi: Kategori dihapus
- [ ] Verifikasi: Kategori yang punya aset tidak bisa dihapus (error message)

---

### SECTION 4: USER MANAGEMENT

#### Test 4.1: View User List
- [ ] Login sebagai admin
- [ ] Akses `/admin/users`
- [ ] Verifikasi: Daftar user ditampilkan

#### Test 4.2: Create User
- [ ] Klik "Tambah User"
- [ ] Isi form:
  - [ ] Nama: `Teknisi Baru`
  - [ ] Email: `teknisi2@simtik.com`
  - [ ] Role: `technician`
  - [ ] Division: `TIK`
  - [ ] Password: `password123`
- [ ] Submit
- [ ] Verifikasi: User baru muncul di list

#### Test 4.3: Edit User
- [ ] Klik Edit pada user
- [ ] Ubah role atau divisi
- [ ] Submit
- [ ] Verifikasi: Perubahan tersimpan

#### Test 4.4: Delete User
- [ ] Pilih user
- [ ] Klik Delete
- [ ] Verifikasi: Confirmation dialog
- [ ] Klik confirm
- [ ] Verifikasi: User dihapus

#### Test 4.5: Test New User Can Login
- [ ] Logout dari admin
- [ ] Login dengan user baru yang dibuat
- [ ] Verifikasi: Dapat login dengan akun baru

---

### SECTION 5: TICKET SYSTEM

#### Test 5.1: Create Ticket (User/Pelapor)
- [ ] Login sebagai user biasa
- [ ] Klik "Buat Laporan Baru" di dashboard
- [ ] Isi form:
  - [ ] Judul: `Laptop Rusak`
  - [ ] Aset: Pilih aset yang ada
  - [ ] Prioritas: `High`
  - [ ] Deskripsi: `Laptop tidak bisa menyala`
- [ ] Submit
- [ ] Verifikasi: Tiket baru dibuat
- [ ] Status default: `Pending`
- [ ] Reporter: Auto-fill dengan user yang login

#### Test 5.2: View Ticket List (User)
- [ ] Masih login sebagai user
- [ ] Akses `/tickets`
- [ ] Verifikasi: Hanya lihat tiket yang dibuat user sendiri
- [ ] Status tiket terlihat
- [ ] Teknisi yang ditugaskan terlihat

#### Test 5.3: View Ticket Detail (User)
- [ ] Klik salah satu tiket
- [ ] Verifikasi:
  - [ ] Deskripsi lengkap ditampilkan
  - [ ] Detail aset ditampilkan (jika ada)
  - [ ] Status saat ini terlihat
  - [ ] Teknisi yang ditugaskan terlihat

#### Test 5.4: View Ticket List (Admin)
- [ ] Logout dan login sebagai admin
- [ ] Akses `/tickets`
- [ ] Verifikasi: Admin bisa lihat SEMUA tiket dari semua user

#### Test 5.5: Assign Technician (Admin)
- [ ] Lihat detail tiket
- [ ] Jika belum ada teknisi yang ditugaskan:
  - [ ] Dropdown teknisi muncul
  - [ ] Pilih teknisi
  - [ ] Verifikasi: Teknisi tersimpan

#### Test 5.6: Update Ticket Status (Admin)
- [ ] Di halaman detail tiket, admin melihat form status
- [ ] Ubah status: `Pending` → `Processing`
- [ ] Submit
- [ ] Verifikasi: Status berubah di database
- [ ] Refresh halaman, status masih berubah

#### Test 5.7: Update Ticket Status (Technician)
- [ ] Logout dan login sebagai technician
- [ ] Lihat tiket yang ditugaskan kepadanya
- [ ] Ubah status: `Processing` → `Done`
- [ ] Submit
- [ ] Verifikasi: Status berubah
- [ ] Coba ubah tiket yang TIDAK ditugaskan kepadanya
- [ ] Verifikasi: Tidak bisa ubah (access denied)

#### Test 5.8: User Cannot Change Ticket Status
- [ ] Logout dan login sebagai user
- [ ] Lihat tiket yang dibuat sendiri
- [ ] Verifikasi: Form update status TIDAK terlihat
- [ ] Hanya admin dan technician yang bisa ubah status

---

### SECTION 6: DASHBOARD & STATISTICS

#### Test 6.1: Admin Dashboard
- [ ] Login sebagai admin
- [ ] Dashboard menampilkan:
  - [ ] Total Aset
  - [ ] Total Tiket
  - [ ] Tiket Pending
  - [ ] Tiket Processing
  - [ ] Quick links ke management pages

#### Test 6.2: Technician Dashboard
- [ ] Login sebagai technician
- [ ] Dashboard menampilkan:
  - [ ] Tiket yang ditugaskan ke saya
  - [ ] Tiket Pending (milik saya)
  - [ ] Tiket Selesai (milik saya)

#### Test 6.3: User Dashboard
- [ ] Login sebagai user
- [ ] Dashboard menampilkan:
  - [ ] Total tiket saya
  - [ ] Tiket Pending (milik saya)
  - [ ] Button "Buat Laporan Baru"
  - [ ] Button "Lihat Tiket Saya"

---

### SECTION 7: WORKFLOW & BUSINESS LOGIC

#### Test 7.1: Ticket Status Flow
- [ ] Create tiket dengan user → Status: Pending
- [ ] Admin assign ke technician
- [ ] Technician ubah ke Processing
- [ ] Technician ubah ke Done
- [ ] Verifikasi: Status flow Pending → Processing → Done bekerja

#### Test 7.2: Asset Status Change via Ticket
- [ ] Buat tiket untuk aset dengan status "Baik"
- [ ] Ubah status aset menjadi "Rusak Ringan"
- [ ] Submit
- [ ] Verifikasi: Status aset di database berubah

#### Test 7.3: Relation: Ticket → Reporter
- [ ] Buat tiket sebagai user A
- [ ] Login sebagai admin
- [ ] Lihat tiket → Reporter terlihat "User A"
- [ ] Verifikasi: Relasi bekerja

#### Test 7.4: Relation: Ticket → Technician
- [ ] Assign tiket ke technician tertentu
- [ ] Verifikasi: Technician terlihat di field "Teknisi yang ditugaskan"

#### Test 7.5: Relation: Ticket → Asset
- [ ] Buat tiket dengan memilih aset
- [ ] Di halaman detail tiket, detail aset ditampilkan
- [ ] Verifikasi: Relasi many-to-one bekerja

#### Test 7.6: Relation: Asset → Category
- [ ] Lihat detail aset
- [ ] Kategori aset ditampilkan dengan benar
- [ ] Verifikasi: Relasi many-to-one bekerja

#### Test 7.7: Role-Based Data Filtering
- [ ] User hanya lihat tiket yang dibuat sendiri
- [ ] Technician hanya lihat tiket yang ditugaskan
- [ ] Admin lihat semua tiket
- [ ] Verifikasi: Filter di controller bekerja dengan benar

---

### SECTION 8: FORM VALIDATION

#### Test 8.1: Asset Form Validation
- [ ] Coba submit form asset tanpa mengisi required field
- [ ] Verifikasi: Error message muncul
- [ ] Verifikasi: Field tidak tersimpan

#### Test 8.2: Category Form Validation
- [ ] Coba submit form kategori dengan nama kosong
- [ ] Verifikasi: Error message muncul

#### Test 8.3: Ticket Form Validation
- [ ] Coba submit form tiket tanpa judul
- [ ] Verifikasi: Error message muncul
- [ ] Coba submit dengan deskripsi kosong
- [ ] Verifikasi: Error message muncul

#### Test 8.4: Duplicate Asset Tag Validation
- [ ] Buat aset dengan tag `IT-L-001`
- [ ] Coba buat aset lain dengan tag yang sama
- [ ] Verifikasi: Error "Asset tag sudah digunakan"

#### Test 8.5: Duplicate Category Name Validation
- [ ] Buat kategori `Komputer`
- [ ] Coba buat kategori lain dengan nama sama
- [ ] Verifikasi: Error "Nama kategori sudah digunakan"

---

### SECTION 9: ERROR HANDLING

#### Test 9.1: Database Connection Error
- [ ] Stop MySQL
- [ ] Coba akses halaman
- [ ] Verifikasi: Error page ditampilkan (bukan blank page)
- [ ] Start MySQL kembali

#### Test 9.2: 404 Error
- [ ] Coba akses halaman yang tidak ada: `/invalid-page`
- [ ] Verifikasi: 404 page ditampilkan

#### Test 9.3: 403 Forbidden
- [ ] Login sebagai user
- [ ] Coba akses `/admin/users` langsung
- [ ] Verifikasi: 403 error atau redirect

#### Test 9.4: Missing Required Field
- [ ] Submit form tanpa field required
- [ ] Verifikasi: Error message di bawah field
- [ ] Verifikasi: Data tidak tersimpan

---

### SECTION 10: UI/UX & PERFORMANCE

#### Test 10.1: Responsive Design
- [ ] Akses aplikasi di desktop browser (1920x1080)
- [ ] Verifikasi: Layout terlihat baik
- [ ] Akses di mobile browser (375x667)
- [ ] Verifikasi: Layout responsive, tidak overflow

#### Test 10.2: Page Load Speed
- [ ] Akses halaman asset list (dengan 50+ data)
- [ ] Verifikasi: Page load < 3 detik
- [ ] Check browser console untuk performance

#### Test 10.3: Form Submission Speed
- [ ] Submit form besar (misal: create asset)
- [ ] Verifikasi: < 2 detik untuk submit dan redirect

#### Test 10.4: Search/Filter Performance
- [ ] Filter data dengan banyak records
- [ ] Verifikasi: Filter responsif

#### Test 10.5: Menu Navigation
- [ ] Klik semua menu items
- [ ] Verifikasi: Semua link berfungsi
- [ ] Verifikasi: Active menu highlight bekerja

---

### SECTION 11: DATA INTEGRITY

#### Test 11.1: Foreign Key Constraint
- [ ] Buat aset dengan kategori X
- [ ] Coba hapus kategori X
- [ ] Verifikasi: Kategori tidak bisa dihapus (ada error)

#### Test 11.2: User Soft Delete (Optional)
- [ ] Hapus user
- [ ] Check di database apakah soft delete atau hard delete
- [ ] Verifikasi: Konsisten dengan design

#### Test 11.3: Timestamp Tracking
- [ ] Buat aset baru
- [ ] Check `created_at` dan `updated_at`
- [ ] Edit aset
- [ ] Verifikasi: `updated_at` berubah

#### Test 11.4: Data Consistency
- [ ] Buat relasi: User → Ticket → Asset → Category
- [ ] Hapus salah satu (jika cascade delete)
- [ ] Verifikasi: Data konsisten (tidak orphaned)

---

## 📊 TEST RESULTS SUMMARY

### Passed Tests: _____ / 80
### Failed Tests: _____
### Blocked Tests: _____

---

## 🐛 BUG REPORT

### Critical Bugs Found:
```
1. [Issue Description]
   Status: 
   Steps to Reproduce:
   Expected: 
   Actual:
   
2. [Issue Description]
   Status: 
   Steps to Reproduce:
   Expected: 
   Actual:
```

### Minor Issues Found:
```
1. [Issue Description]
2. [Issue Description]
```

---

## ✅ RECOMMENDATIONS

- [ ] Fix all critical bugs before production
- [ ] Optimize database queries if needed
- [ ] Add more unit tests
- [ ] Setup monitoring and logging
- [ ] Create user documentation
- [ ] Setup backup strategy

---

## 🎉 FINAL APPROVAL

**All Tests Passed:** YES / NO

**Ready for Production:** YES / NO

**Signed by:** ____________________

**Date:** ________________________

---

**Testing Date:** 29 November 2025  
**Tester:** QA Team

