# ERD SISTEM INFORMASI MANAJEMEN TIK (SIM-TIK)

## 📊 ENTITY RELATIONSHIP DIAGRAM

```
┌─────────────────┐       ┌─────────────────┐
│    DIVISIONS    │       │      USERS      │
├─────────────────┤       ├─────────────────┤
│ PK id (BIGINT)  │◀──────┤ PK id (BIGINT)  │
│    name (VARCHAR)│       │    name (VARCHAR)│
│ head_name (VARCHAR)│     │   email (VARCHAR)│
│ created_at (TIMESTAMP) │ │password (VARCHAR)│
│ updated_at (TIMESTAMP) │ │   role (ENUM)    │
└─────────────────┘       │division_id (BIGINT)│◀──────┐
                          │email_verified_at (TIMESTAMP)│
                          │ created_at (TIMESTAMP) │
                          │ updated_at (TIMESTAMP) │
                          └─────────────────┘
                                │
                                │
                ┌───────────────┼──────────────────┐
                │               │                  │
                ▼               ▼                  ▼
        ┌─────────────┐ ┌─────────────┐    ┌─────────────┐
        │   TICKETS    │ │ASSET_REQUESTS│    │   ASSETS    │
        ├─────────────┤ ├─────────────┤    ├─────────────┤
        │PK id (BIGINT)│ │PK id (BIGINT)│    │PK id (BIGINT)│
        │subject (TEXT)│ │name (VARCHAR)│    │asset_tag (VARCHAR)│
        │description (TEXT)││asset_tag (VARCHAR)││name (VARCHAR)│
        │reporter_id (BIGINT)││category_id (BIGINT)││category_id (BIGINT)│
        │technician_id (BIGINT)││status (ENUM)│    │serial_number (VARCHAR)│
        │priority (ENUM)│ │reason (TEXT)│    │status (ENUM)│
        │status (ENUM) │ │notes (TEXT)│     │location (VARCHAR)│
        │asset_id (BIGINT)│ │user_id (BIGINT)│   │purchase_date (DATE)│
        │category_id (BIGINT)│ │approved_by (BIGINT)││created_at (TIMESTAMP)│
        │created_at (TIMESTAMP)│ │approved_at (TIMESTAMP)││updated_at (TIMESTAMP)│
        │updated_at (TIMESTAMP)│ │rejection_reason (TEXT)│└─────────────┘
        └─────────────┘ │created_at (TIMESTAMP)│
                │       │updated_at (TIMESTAMP)│
                │       └─────────────┘
                │               │
                │               ▼
                │       ┌─────────────┐
                │       │  CATEGORIES │
                │       ├─────────────┤
                │       │PK id (BIGINT)│
                └──────►│name (VARCHAR)│
                        │created_at (TIMESTAMP)│
                        │updated_at (TIMESTAMP)│
                        └─────────────┘
```

## 🔗 RELASI ANTAR TABEL

### 1. USERS ↔ DIVISIONS
- **Type**: One-to-Many
- **Relasi**: Satu divisi memiliki banyak user, satu user hanya memiliki satu divisi
- **FK**: `users.division_id` → `divisions.id`

### 2. TICKETS ↔ USERS (Reporter)
- **Type**: Many-to-One  
- **Relasi**: Banyak tiket dilaporkan oleh satu user, satu user bisa melaporkan banyak tiket
- **FK**: `tickets.reporter_id` → `users.id`

### 3. TICKETS ↔ USERS (Technician)
- **Type**: Many-to-One
- **Relasi**: Banyak tiket ditangani oleh satu teknisi, satu teknisi bisa menangani banyak tiket
- **FK**: `tickets.technician_id` → `users.id`

### 4. TICKETS ↔ ASSETS
- **Type**: Many-to-One
- **Relasi**: Banyak tiket terkait dengan satu aset, satu aset bisa memiliki banyak tiket
- **FK**: `tickets.asset_id` → `assets.id`

### 5. TICKETS ↔ CATEGORIES
- **Type**: Many-to-One
- **Relasi**: Banyak tiket dalam satu kategori, satu kategori memiliki banyak tiket
- **FK**: `tickets.category_id` → `categories.id`

### 6. ASSETS ↔ CATEGORIES
- **Type**: Many-to-One
- **Relasi**: Banyak aset dalam satu kategori, satu kategori memiliki banyak aset
- **FK**: `assets.category_id` → `categories.id`

### 7. ASSET_REQUESTS ↔ USERS (Requester)
- **Type**: Many-to-One
- **Relasi**: Banyak pengajuan diajukan oleh satu user, satu user bisa mengajukan banyak pengajuan
- **FK**: `asset_requests.user_id` → `users.id`

### 8. ASSET_REQUESTS ↔ USERS (Approver)
- **Type**: Many-to-One
- **Relasi**: Banyak pengajuan disetujui oleh satu user, satu user bisa menyetujui banyak pengajuan
- **FK**: `asset_requests.approved_by` → `users.id`

### 9. ASSET_REQUESTS ↔ CATEGORIES
- **Type**: Many-to-One
- **Relasi**: Banyak pengajuan dalam satu kategori, satu kategori memiliki banyak pengajuan
- **FK**: `asset_requests.category_id` → `categories.id`

## 📋 DETAIL TABEL DAN TIPE DATA

### 🏢 DIVISIONS
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | BIGINT (PK, AI) | Primary Key, Auto Increment |
| name | VARCHAR(255) | Nama divisi |
| head_name | VARCHAR(255) | Nama kepala divisi |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

### 👥 USERS
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | BIGINT (PK, AI) | Primary Key, Auto Increment |
| name | VARCHAR(255) | Nama lengkap user |
| email | VARCHAR(255) | Email user (unique) |
| password | VARCHAR(255) | Password terenkripsi |
| role | ENUM('admin','technician','user') | Peran user |
| division_id | BIGINT (FK) | Foreign key ke divisions.id |
| email_verified_at | TIMESTAMP | Verifikasi email |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

### 🎫 TICKETS
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | BIGINT (PK, AI) | Primary Key, Auto Increment |
| subject | TEXT | Subjek tiket |
| description | TEXT | Deskripsi masalah |
| reporter_id | BIGINT (FK) | Foreign key ke users.id |
| technician_id | BIGINT (FK, nullable) | Foreign key ke users.id |
| priority | ENUM('Low','Medium','High') | Prioritas tiket |
| status | ENUM('Pending','Processing','Done','Closed') | Status tiket |
| asset_id | BIGINT (FK, nullable) | Foreign key ke assets.id |
| category_id | BIGINT (FK) | Foreign key ke categories.id |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

### 💻 ASSETS
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | BIGINT (PK, AI) | Primary Key, Auto Increment |
| asset_tag | VARCHAR(255) | Kode unik aset |
| name | VARCHAR(255) | Nama aset |
| category_id | BIGINT (FK) | Foreign key ke categories.id |
| serial_number | VARCHAR(255) | Nomor seri |
| status | ENUM('Available','In Use','Maintenance','Broken') | Status aset |
| location | VARCHAR(255) | Lokasi aset |
| purchase_date | DATE | Tanggal pembelian |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

### 🏷️ CATEGORIES
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | BIGINT (PK, AI) | Primary Key, Auto Increment |
| name | VARCHAR(255) | Nama kategori |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

### 📋 ASSET_REQUESTS
| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| id | BIGINT (PK, AI) | Primary Key, Auto Increment |
| name | VARCHAR(255) | Nama pengajuan |
| asset_tag | VARCHAR(255) | Kode aset yang diajukan |
| category_id | BIGINT (FK) | Foreign key ke categories.id |
| status | ENUM('pending','approved','rejected') | Status pengajuan |
| reason | TEXT | Alasan pengajuan |
| notes | TEXT | Catatan tambahan |
| user_id | BIGINT (FK) | Foreign key ke users.id |
| approved_by | BIGINT (FK, nullable) | Foreign key ke users.id |
| approved_at | TIMESTAMP (nullable) | Waktu persetujuan |
| rejection_reason | TEXT (nullable) | Alasan penolakan |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

## 🗝️ KETERANGAN SIMBOL
- **PK**: Primary Key
- **FK**: Foreign Key  
- **AI**: Auto Increment
- **nullable**: Boleh kosong
- **ENUM**: Tipe data enumerasi (pilihan terbatas)

## 🔄 FLOW RELASI UTAMA
1. **User** berada dalam **Division**
2. **User** bisa membuat **Ticket** dan **AssetRequest**
3. **Ticket** terkait dengan **Asset** dan **Category**
4. **Asset** termasuk dalam **Category**
5. **AssetRequest** meminta **Asset** dari **Category**
6. **User** (Admin/Technician) bisa menyetujui **AssetRequest** dan menangani **Ticket**
