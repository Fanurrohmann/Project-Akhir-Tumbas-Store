# Project-Akhir-Tumbas-Store
Project ini adalah source code dari E-commerce Tumbas Store yang saya buat dengan Laravel 10, dengan PHP 8.1, dan dibuat untuk memenuhi tugas akhir SIB Batch 7


## Screenshots

![Preview Image](/preview_login.png)
![Preview Image](/preview_dashboard.png)
![Preview Image](/preview_produk.png)

---

## Installation

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini:

1. Masuk ke folder proyek dengan perintah:
   cd nama_projek

2. Salin file .env.example menjadi .env:
    cp .env.example .env

3. Konfigurasi file .env sesuai dengan pengaturan Anda:
    Database: Masukkan detail koneksi database.
    API Key Raja Ongkir: Tambahkan API key dari Raja Ongkir.
    Midtrans Server Key: Masukkan server key dari Midtrans.

4. Instal dependensi dengan Composer:
    composer install

5. Generate application key:
    php artisan key:generate

6. Migrasikan dan seed database:
    php artisan migrate:fresh --seed

7. Buat symbolic link untuk penyimpanan:
    php artisan storage:link

### Login
    Gunakan kredensial berikut untuk masuk ke sistem:

- Email: admin@admin.com
- Password: 123

## Notes
Pastikan Composer dan PHP sudah diinstal di sistem .
Pastikan semua layanan yang dibutuhkan (database, storage, dll.) sudah dikonfigurasi dengan benar sebelum menjalankan aplikasi.
