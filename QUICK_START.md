# 🚀 QUICK START GUIDE - SIM-TIK

## Langkah 1: Verifikasi Environment
```bash
# Check PHP version (harus >= 8.2)
php --version

# Check MySQL connection
# Pastikan XAMPP MySQL sudah running
```

## Langkah 2: Jalankan Development Server
```bash
cd c:\xampp\htdocs\sim-tik
php artisan serve
```
**Output:**
```
INFO  Server running on [http://127.0.0.1:8000].
```

## Langkah 3: Akses Application
Buka browser dan kunjungi: **http://localhost:8000**

---

## 📱 HALAMAN-HALAMAN UTAMA

### Public Pages
- `http://localhost:8000/` - Welcome Page
- `http://localhost:8000/register` - Register User
- `http://localhost:8000/login` - Login

### General Authenticated Pages
- `http://localhost:8000/dashboard` - Dashboard (redirect ke role-based page)
- `http://localhost:8000/tickets` - Daftar Tiket
- `http://localhost:8000/profile` - Edit Profile

### User/Pelapor Pages
- `http://localhost:8000/lapor` - Buat Laporan Tiket Baru

### Admin Pages
- `http://localhost:8000/admin/dashboard` - Admin Dashboard
- `http://localhost:8000/admin/assets` - Manajemen Aset
- `http://localhost:8000/admin/assets/create` - Tambah Aset
- `http://localhost:8000/admin/categories` - Manajemen Kategori
- `http://localhost:8000/admin/users` - Manajemen User

---

## 🔐 DEFAULT LOGIN CREDENTIALS

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@simtik.com | password |
| Technician | teknisi@simtik.com | password |
| User | user@simtik.com | password |

---

## 🛠️ COMMAND YANG BERGUNA

```bash
# Clear all cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Run database migrations
php artisan migrate

# Run database seeders
php artisan db:seed

# Fresh install (reset database)
php artisan migrate:fresh --seed

# Check routes
php artisan route:list

# Run tests
php artisan test
```

---

## 📂 STRUKTUR FOLDER PENTING

```
sim-tik/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── TicketController.php
│   │   │   └── Admin/
│   │   │       ├── AdminController.php
│   │   │       ├── AssetController.php
│   │   │       ├── CategoryController.php
│   │   │       └── UserController.php
│   │   └── Middleware/
│   │       └── RoleMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Asset.php
│       ├── Category.php
│       ├── Division.php
│       └── Ticket.php
├── routes/
│   ├── web.php
│   └── auth.php
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   ├── assets/
│       │   ├── categories/
│       │   └── users/
│       └── ticket/
├── database/
│   ├── migrations/
│   └── seeders/
└── storage/
    └── logs/
        └── laravel.log
```

---

## 🐛 TROUBLESHOOTING

### Error: "SQLSTATE[HY000]: General error: 1030 Got an error from storage engine"
**Solusi:** Restart MySQL service di XAMPP

### Error: "No application encryption key has been generated"
**Solusi:** Jalankan:
```bash
php artisan key:generate
```

### Error: "Access denied" di Admin Pages
**Solusi:** Pastikan Anda login dengan user yang memiliki role "admin"

### Database tidak menemukan tabel
**Solusi:** Jalankan migrations:
```bash
php artisan migrate
php artisan db:seed
```

### View tidak ter-update
**Solusi:** Clear view cache:
```bash
php artisan view:clear
```

---

## 📊 USER ROLES & PERMISSIONS

### Admin
- ✅ Akses semua fitur
- ✅ Manage Aset (CRUD)
- ✅ Manage Kategori (CRUD)
- ✅ Manage User (CRUD)
- ✅ View semua Tiket
- ✅ Update status Tiket

### Technician
- ✅ View Tiket (assigned & unassigned)
- ✅ Update status Tiket
- ✅ View own Profile

### User/Pelapor
- ✅ Create Tiket (Laporan)
- ✅ View own Tiket
- ✅ Edit own Profile

---

## 🎯 FITUR UTAMA YANG SUDAH SIAP

| Fitur | Status |
|-------|--------|
| User Authentication | ✅ Berfungsi |
| Role-based Authorization | ✅ Berfungsi |
| Asset Management | ✅ Berfungsi |
| Category Management | ✅ Berfungsi |
| User Management | ✅ Berfungsi |
| Ticket/Laporan System | ✅ Berfungsi |
| Admin Dashboard | ✅ Berfungsi |
| Database Seeding | ✅ Berfungsi |

---

## 📞 BANTUAN TAMBAHAN

Jika menemukan error, cek file logs:
- `storage/logs/laravel.log` - Application logs
- Console browser (F12) - Frontend errors
- Terminal/Command Prompt - Server errors

---

**Last Updated:** 29 November 2025
**Status:** ✅ SIAP PRODUKSI
