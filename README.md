# 📁 Sistem Informasi Manajemen Arsip Surat (Surat Masuk & Surat Keluar)

Aplikasi web berbasis **Laravel 12** yang dirancang untuk mengelola, mencatat, dan mengarsipkan dokumen **Surat Masuk** dan **Surat Keluar** secara terdigitalisasi, aman, dan terstruktur. Dilengkapi dengan fitur cetak laporan bulanan dalam format **PDF** dan **Excel (XLSX)**.

---

## 🌟 Fitur Utama

- **📥 Manajemen Surat Masuk**: Pencatatan nomor surat, tanggal surat, tanggal terima, pengirim, perihal, ditujukan, serta upload berkas fisik (PDF/Gambar).
- **📤 Manajemen Surat Keluar**: Pencatatan nomor surat, tanggal surat, tanggal kirim, perihal, ditujukan, serta upload berkas fisik.
- **📊 Dashboard Interaktif**: Menampilkan ringkasan dan statistik total surat masuk & surat keluar.
- **📈 Laporan Bulanan & Ekspor**:
  - Filter laporan berdasarkan **Bulan** dan **Tahun**.
  - **Ekspor PDF**: Format lanskap A4 siap cetak (`barryvdh/laravel-dompdf`).
  - **Ekspor Excel**: Format Spreadsheet `.xlsx` (`maatwebsite/excel`).
- **🔐 Manajemen Pengguna & Autentikasi**: Sistem autentikasi berbasis **Laravel Breeze**, manajemen akun pengguna, dan pengaturan profil.

---

## 🛠️ Tech Stack & Dependensi

- **Backend**: PHP >= 8.2, [Laravel 12](https://laravel.com)
- **Frontend**: Blade Templating, [Tailwind CSS v4](https://tailwindcss.com), [Alpine.js](https://alpinejs.dev), [Vite](https://vitejs.dev)
- **Database**: SQLite (Default) / MySQL / PostgreSQL
- **Package Pendukung**:
  - `barryvdh/laravel-dompdf`: Cetak & ekspor dokumen ke PDF
  - `maatwebsite/excel`: Ekspor rekapitulasi data ke format Excel
  - `laravel/breeze`: Autentikasi user & manajemen profil
  - `pestphp/pest`: Framework pengujian (Testing)

---

## 📋 Prasyarat Sistem (Prerequisites)

Pastikan perangkat Anda sudah terinstall komponen berikut:

- **PHP** `>= 8.2` (dengan ekstensi `pdo`, `sqlite3` / `mysqli`, `gd`, `mbstring`, `zip`)
- **Composer** `>= 2.x`
- **Node.js** `>= 18.x` & **NPM**

---

## 🚀 Panduan Instalasi & Menjalankan Lokal

Ikuti langkah-langkah berikut untuk menjalankan project di lingkungan lokal:

### 1. Clone Repository
```bash
git clone <URL_REPOSITORY_ANDA>
cd sistem-arsip-backup
```

### 2. Install Dependensi PHP & Node.js
```bash
composer install
npm install
```

### 3. Konfigurasi Environment (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
# Untuk Linux / WSL / macOS
cp .env.example .env

# Untuk Windows PowerShell
copy .env.example .env
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Setup Database & Jalankan Migrasi
Secara default, aplikasi ini dikonfigurasi menggunakan database **SQLite**. 
Jalankan perintah berikut untuk migrasi tabel beserta data awal (seeder):

```bash
# Membuat file SQLite jika belum ada dan jalankan migrasi + seeder
php artisan migrate --seed
```

> 💡 *Catatan*: Jika ingin menggunakan MySQL/MariaDB, ubah konfigurasi `DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di file `.env` terlebih dahulu sebelum menjalankan `php artisan migrate --seed`.

### 6. Buat Storage Link (Untuk Akses File Upload Surat)
```bash
php artisan storage:link
```

### 7. Jalankan Aplikasi
Anda dapat menjalankan server aplikasi dan pembaca aset Vite secara bersamaan menggunakan skrip Composer dev:

```bash
composer dev
```
*Atau jika ingin menjalankan perintah terpisah:*

```bash
# Terminal 1 (Server Laravel)
php artisan serve

# Terminal 2 (Vite Compiler)
npm run dev
```

Buka browser Anda dan akses: **[http://localhost:8000](http://localhost:8000)**

---

## 🔐 Kredensial Login Default (Seeder)

Setelah menjalankan `php artisan migrate --seed`, Anda dapat login menggunakan akun berikut:

- **Email**: `admin@gmail.com`
- **Password**: `rahasia123`

---

## 🧪 Menjalankan Pengujian (Testing)

Untuk memastikan seluruh fungsi berjalan dengan baik, Anda dapat menjalankan unit/integration test menggunakan Pest:

```bash
composer test
# atau
php artisan test
```

---

## 📁 Struktur Direktori Utama

```text
├── app/
│   ├── Http/Controllers/   # Controller Surat Masuk, Surat Keluar, Laporan, User, Dashboard
│   ├── Models/             # Model Eloquent (SuratMasuk, SuratKeluar, User)
│   ├── Services/           # Logic pemrosesan Laporan & Arsip
│   └── Exports/            # Logic Export Excel
├── database/
│   ├── migrations/         # Skema database surat masuk, surat keluar, users
│   └── seeders/            # DatabaseSeeder (User Admin Default)
├── resources/
│   └── views/              # Template Tampilan Blade (Surat, Laporan, Auth)
├── routes/
│   └── web.php             # Route web aplikasi
└── storage/
    └── app/public/         # Tempat penyimpanan berkas surat terupload
```

---

## 📄 Lisensi

Project ini dibuat untuk kebutuhan manajemen arsip digital. Lisensi terbuka di bawah [MIT License](LICENSE).

