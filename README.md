# Aplikasi Inventory Sederhana (Test CV Citra Baru Busana)

Sistem informasi manajemen inventory gudang sederhana dengan fitur Web UI dan REST API, dibangun menggunakan Laravel 10.

## Fitur yang Tersedia

**Requirement Wajib:**
- **CRUD Produk:** Mengelola kode produk, nama, satuan, stok, dan harga.
- **Input Transaksi Stok:** Mencatat barang masuk dan keluar.
- **Validasi Stok Minus:** Transaksi "keluar" otomatis ditolak jika jumlah melebihi stok yang tersedia (Menerapkan `DB::beginTransaction` & `lockForUpdate` untuk mencegah *race condition*).
- **Pencarian Data:** Mencari produk berdasarkan kode atau nama.
- **REST API:** Endpoint API JSON konsisten untuk melihat produk, menambah produk, dan input transaksi.
- **Git Commit:** Riwayat pengerjaan di-commit secara bertahap.

**Requirement Opsional (Bonus Tambahan):**
- **Laporan Stok Menipis:** Peringatan UI otomatis jika ada produk dengan stok <= 10.
- **Histori Transaksi per Produk:** Melihat riwayat masuk/keluarnya barang secara spesifik pada masing-masing produk.
- **Automated Feature Test:** Unit Test untuk memvalidasi penolakan sistem terhadap input stok minus.

---

## Cara Instalasi & Menjalankan Project

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini di komputer lokal Anda (Localhost):

1. **Clone repository ini** ke dalam folder lokal mesin Anda:
   git clone https://github.com/anxdryy/Aplikasi-Inventory-Sederhana.git
   cd Aplikasi-Inventory-Sederhana
2. Install semua dependencies menggunakan Composer:
   composer install
3. Buat Model, Migration, & Controller
  Jalankan perintah ini sekaligus di terminal:
    php artisan make:model Product -mcr
    php artisan make:model Transaction -mcr
    php artisan make:controller Api/ProductApiController
    php artisan make:controller Api/TransactionApiController
4. Setup Environment Variables:
   cp .env.example .env
   php artisan key:generate
5. Setup Database (MySQL/MariaDB):
   Buat database baru di MySQL Anda (misalnya dengan nama: inventory_db).
    Env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=inventory_db
    DB_USERNAME=root
    DB_PASSWORD=
6. Jalankan Migrasi & Seeder (Wajib):
   php artisan migrate:fresh --seed
7. Jalankan Local Development Server:
   php artisan serve
8. Buat file Test di Terminal
   php artisan make:test TransactionTest
9. Jalankan Automated Feature Test (Opsional):
   php artisan test --filter TransactionTest
10. lalu jalankan php artisan serve
