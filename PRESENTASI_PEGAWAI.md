# PRESENTASI SISTEM PENDATAAN PEGAWAI
## Tugas Kelompok - Aplikasi Web

---

## SLIDE 1: JUDUL & OVERVIEW
# Sistem Pendataan Pegawai
### Aplikasi Web dengan CRUD Operations

**Tim Pengembang:**
- [Nama Anggota 1]
- [Nama Anggota 2]
- [Nama Anggota 3]

**Teknologi:** CodeIgniter 4, MySQL, Bootstrap

---

## SLIDE 2: LATAR BELAKANG & TUJUAN
### Latar Belakang
- Perusahaan membutuhkan sistem untuk mengelola data pegawai
- Data pegawai perlu dikelompokkan berdasarkan divisi
- Diperlukan akses berbeda untuk publik dan admin

### Tujuan
- Membuat sistem pendataan pegawai dengan fitur CRUD lengkap
- Mengelompokkan pegawai berdasarkan divisi (IT, Marketing, HR, Operasional)
- Menyediakan interface publik untuk melihat data
- Menyediakan interface admin untuk mengelola data

---

## SLIDE 3: FITUR UTAMA
### Fitur yang Diimplementasikan

**1. Manajemen Data Pegawai**
- Create: Tambah data pegawai baru
- Read: Lihat daftar pegawai
- Update: Edit data pegawai
- Delete: Hapus data pegawai

**2. Pengelompokan Divisi**
- IT
- Marketing
- HR
- Operasional

**3. Upload Foto Pegawai**
- Upload dan simpan foto pegawai
- Preview foto sebelum upload

---

## SLIDE 4: STRUKTUR DATABASE
### Tabel: `pegawai`

| Kolom | Tipe Data | Keterangan |
|-------|-----------|------------|
| `id_pegawai` | INT | Primary Key, Auto Increment |
| `nama_pegawai` | VARCHAR(255) | Nama lengkap pegawai |
| `tanggal_lahir` | DATE | Tanggal lahir pegawai |
| `jenis_kelamin` | ENUM | 'laki-laki' atau 'perempuan' |
| `foto_pegawai` | VARCHAR(255) | Nama file foto |
| `divisi` | ENUM | 'IT', 'Marketing', 'HR', 'Operasional' |
| `created_at` | DATETIME | Waktu pembuatan |
| `updated_at` | DATETIME | Waktu update |

**Relasi:** Tidak ada relasi (tabel standalone)

---

## SLIDE 5: HALAMAN PUBLIK (FRONTEND)
### Fitur Halaman Publik

**URL:** `/pegawai`

**Fungsi:**
- ✅ Menampilkan semua data pegawai
- ✅ Filter berdasarkan divisi (Tab Navigation)
- ✅ Tampilan card yang menarik dan responsif
- ✅ Menampilkan foto, nama, jenis kelamin, tanggal lahir, dan divisi
- ❌ Tidak ada akses untuk edit/hapus

**Desain:**
- Modern card layout
- Tab navigation untuk divisi
- Responsive design (mobile-friendly)
- Dark mode support

---

## SLIDE 6: HALAMAN ADMIN (BACKEND)
### Fitur Halaman Admin

**URL:** `/admin/pegawai`

**Fungsi:**
- ✅ CRUD lengkap (Create, Read, Update, Delete)
- ✅ Filter berdasarkan divisi
- ✅ Upload dan edit foto pegawai
- ✅ Validasi form input
- ✅ Konfirmasi sebelum delete

**Keamanan:**
- Protected route dengan authentication
- Hanya admin yang bisa akses
- CSRF protection

---

## SLIDE 7: OPERASI CRUD - CREATE & READ
### CREATE (Tambah Data)

**Form Input:**
- Nama Pegawai (required, min 3 karakter)
- Tanggal Lahir (date picker)
- Jenis Kelamin (dropdown: Laki-laki/Perempuan)
- Divisi (dropdown: IT/Marketing/HR/Operasional)
- Foto Pegawai (upload file, max 2MB, format: JPG/PNG/GIF)

**Validasi:**
- Server-side validation
- Client-side validation
- Error message yang jelas

### READ (Lihat Data)
- Tabel data dengan pagination
- Filter by divisi
- Search functionality
- Responsive table design

---

## SLIDE 8: OPERASI CRUD - UPDATE & DELETE
### UPDATE (Edit Data)

**Fitur:**
- Edit semua field kecuali ID
- Preview foto lama
- Upload foto baru (optional)
- Auto delete foto lama saat upload baru
- Validasi sama seperti create

### DELETE (Hapus Data)

**Fitur:**
- Konfirmasi sebelum hapus
- Auto delete foto dari server
- Flash message setelah delete
- Soft delete (opsional)

---

## SLIDE 9: TEKNOLOGI & ARSITEKTUR
### Stack Teknologi

**Backend:**
- CodeIgniter 4 (PHP Framework)
- MySQL Database
- MVC Architecture

**Frontend:**
- Bootstrap 4 (CSS Framework)
- JavaScript (Vanilla)
- Custom CSS dengan CSS Variables
- SVG Icons

**Fitur Tambahan:**
- File Upload Handler
- Form Validation
- Session Management
- CSRF Protection
- Theme Toggle (Dark/Light Mode)

### Arsitektur
```
app/
├── Controllers/
│   ├── Pegawai.php (Frontend)
│   └── PegawaiAdmin.php (Backend)
├── Models/
│   └── PegawaiModel.php
├── Views/
│   ├── pegawai.php (Frontend)
│   ├── pegawai_divisi.php (Frontend)
│   ├── admin_list_pegawai.php
│   ├── admin_create_pegawai.php
│   └── admin_edit_pegawai.php
└── Database/
    └── Migrations/
        └── CreatePegawai.php
```

---

## SLIDE 10: KESIMPULAN & DEMO
### Kesimpulan

**✅ Fitur yang Berhasil Diimplementasikan:**
1. CRUD lengkap untuk data pegawai
2. Pengelompokan berdasarkan divisi
3. Upload dan manajemen foto
4. Interface publik dan admin terpisah
5. Validasi form yang komprehensif
6. Desain responsif dan modern

**📊 Statistik:**
- 4 Divisi (IT, Marketing, HR, Operasional)
- 5 Kolom data utama
- 2 Interface (Public & Admin)
- 4 Operasi CRUD lengkap

### Demo Aplikasi
**Langkah-langkah:**
1. Akses halaman publik: `/pegawai`
2. Login sebagai admin: `/login`
3. Akses admin panel: `/admin/pegawai`
4. Demo CRUD operations

**Terima Kasih!**
**Pertanyaan?**

---

## CATATAN UNTUK PRESENTASI

### Poin Penting yang Harus Ditekankan:
1. **Arsitektur MVC** - Jelaskan pemisahan Model, View, Controller
2. **Security** - CSRF protection, authentication, file upload validation
3. **User Experience** - Responsive design, validasi form, feedback messages
4. **Code Quality** - Validasi, error handling, clean code

### Tips Presentasi:
- Siapkan demo aplikasi yang sudah berjalan
- Tunjukkan kode penting (Controller, Model, View)
- Jelaskan alur CRUD dengan diagram
- Siapkan contoh data untuk demo
- Antisipasi pertanyaan tentang security dan validasi

