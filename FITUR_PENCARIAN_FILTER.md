# Fitur Pencarian dan Filter Data Pegawai

## Update Terbaru: Layout Modern & Responsif

### Perbaikan UI/UX:
✅ Layout yang lebih rapi dan modern dengan gradient accent
✅ Form pencarian dengan icon yang informatif
✅ Typography yang lebih jelas dan tidak terpotong
✅ Responsive design untuk semua ukuran layar
✅ Animasi hover yang smooth
✅ Badge dan button dengan style konsisten
✅ Table yang lebih mudah dibaca dengan spacing optimal

## Fitur yang Ditambahkan

### 1. Pencarian (Search)
Pencarian mencakup seluruh kolom data pegawai:
- Nama Pegawai
- Jenis Kelamin
- Divisi
- Tanggal Lahir

**Cara Penggunaan:**
- Ketik kata kunci di kolom "Pencarian"
- Klik tombol "Cari"
- Sistem akan mencari di semua kolom yang relevan

### 2. Filter Berdasarkan Divisi
Filter data pegawai berdasarkan divisi:
- IT
- Marketing
- HR
- Operasional
- Semua Divisi (default)

**Cara Penggunaan:**
- Pilih divisi dari dropdown "Divisi"
- Klik tombol "Cari"

### 3. Filter Berdasarkan Jenis Kelamin
Filter data pegawai berdasarkan jenis kelamin:
- Laki-laki
- Perempuan
- Semua (default)

**Cara Penggunaan:**
- Pilih jenis kelamin dari dropdown "Jenis Kelamin"
- Klik tombol "Cari"

### 4. Kombinasi Filter
Anda dapat menggunakan kombinasi dari:
- Pencarian + Filter Divisi
- Pencarian + Filter Jenis Kelamin
- Filter Divisi + Filter Jenis Kelamin
- Pencarian + Filter Divisi + Filter Jenis Kelamin

### 5. Reset Filter
Tombol "Reset Filter" akan menghapus semua filter dan menampilkan semua data pegawai.

## Implementasi

### Halaman Publik (Frontend)
**URL:** `/pegawai`

Fitur yang tersedia:
- Form pencarian dan filter di bagian atas
- Tab navigasi divisi tetap berfungsi
- Tampilan card yang responsif
- Reset filter untuk kembali ke tampilan awal

### Halaman Admin (Backend)
**URL:** `/admin/pegawai`

Fitur yang tersedia:
- Form pencarian dan filter di bagian atas
- Tampilan tabel dengan semua data
- Tombol reset filter
- Menampilkan jumlah hasil pencarian
- Aksi CRUD tetap berfungsi normal

## Perubahan File

### 1. Model: `app/Models/PegawaiModel.php`
Ditambahkan method baru:
```php
public function searchAndFilter(?string $search = null, ?string $divisi = null, ?string $jenisKelamin = null): array
```

Method ini melakukan:
- Pencarian dengan LIKE di semua kolom
- Filter berdasarkan divisi
- Filter berdasarkan jenis kelamin
- Kombinasi dari semua filter

### 2. Controller Frontend: `app/Controllers/Pegawai.php`
Dimodifikasi method `index()`:
- Menerima parameter GET: search, divisi, jenis_kelamin
- Memanggil method searchAndFilter() dari model
- Mengirim data filter ke view

### 3. Controller Backend: `app/Controllers/PegawaiAdmin.php`
Dimodifikasi method `index()`:
- Menerima parameter GET: search, divisi, jenis_kelamin
- Memanggil method searchAndFilter() dari model
- Mengirim data filter ke view

### 4. View Frontend: `app/Views/pegawai.php`
Ditambahkan:
- Form pencarian dan filter
- Input text untuk pencarian
- Dropdown untuk filter divisi
- Dropdown untuk filter jenis kelamin
- Tombol cari dan reset filter

### 5. View Backend: `app/Views/admin_list_pegawai.php`
Ditambahkan:
- Form pencarian dan filter
- Input text untuk pencarian
- Dropdown untuk filter divisi
- Dropdown untuk filter jenis kelamin
- Tombol cari dan reset filter
- Counter jumlah hasil

## Desain UI

### Halaman Frontend (Publik)

**Search & Filter Card:**
- Background gradient subtle dengan border accent
- Icon SVG untuk setiap field
- Form control dengan border radius 12px
- Focus state dengan shadow glow effect
- Button gradient dengan hover animation
- Filter count badge dengan gradient background
- Responsive grid layout (col-12 → col-lg-6/3)

**Pegawai Cards:**
- Card dengan hover effect (shadow & border)
- Avatar circular dengan border accent
- Typography yang tidak terpotong (word-wrap)
- Badge divisi dengan gradient
- Spacing optimal untuk readability

### Halaman Backend (Admin)

**Header Section:**
- Flexbox layout dengan wrap untuk mobile
- Button "Tambah Pegawai" dengan gradient & icon
- Typography bold dengan Space Grotesk font

**Search & Filter Box:**
- Background gradient subtle (rgba accent)
- Border 2px dengan rounded corners
- Label uppercase dengan letter-spacing
- Form control dengan focus state yang jelas
- Action buttons dengan icon SVG
- Result badge dengan gradient & border

**Table Design:**
- Header dengan gradient background
- Row hover effect dengan subtle color
- Photo/Initial dengan border & shadow
- Gender badge dengan icon & color coding
- Divisi badge dengan gradient
- Action buttons dengan color states
- Typography yang tidak terpotong (max-width + word-wrap)
- Responsive dengan horizontal scroll

### Konsistensi Tema
- CSS variables: --accent, --text-primary, --card-bg, dll
- Border radius: 10-20px (lebih rounded)
- Gradient: linear-gradient(135deg, #7f5bff 0%, #a855f7 100%)
- Shadow: multiple levels (sm, md, lg)
- Spacing: consistent padding & margin
- Typography: Space Grotesk untuk heading, inherit untuk body

### Responsive Breakpoints
- Mobile (< 768px): Full width buttons, stacked layout
- Tablet (768px - 1024px): 2 column grid
- Desktop (> 1024px): 3-4 column grid

### Accessibility
- Semantic HTML structure
- ARIA labels untuk form
- Focus states yang jelas
- Color contrast yang baik
- Icon dengan text label
- Keyboard navigation support

## Testing

### Skenario Testing:
1. **Pencarian Nama:** Cari "John" - harus menampilkan semua pegawai dengan nama mengandung "John"
2. **Filter Divisi:** Pilih "IT" - harus menampilkan hanya pegawai divisi IT
3. **Filter Jenis Kelamin:** Pilih "Laki-laki" - harus menampilkan hanya pegawai laki-laki
4. **Kombinasi:** Cari "a" + Divisi "Marketing" + Jenis Kelamin "Perempuan"
5. **Reset:** Klik reset filter - harus menampilkan semua data

## Catatan Teknis

- Pencarian menggunakan SQL LIKE untuk fleksibilitas
- Filter menggunakan WHERE clause untuk akurasi
- Query dioptimasi dengan query builder CodeIgniter
- Validasi input dilakukan di controller
- XSS protection dengan esc() helper
- URL parameter untuk bookmarking hasil pencarian
