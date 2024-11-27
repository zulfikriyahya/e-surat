<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

**Tentang E-Surat**
Aplikasi Surat adalah sebuah platform digital yang dirancang untuk memudahkan proses manajemen dan pelaporan surat-menyurat. Dengan berbagai fitur yang komprehensif, aplikasi ini menjadi solusi terbaik untuk institusi dalam mengelola data surat masuk dan keluar secara efisien dan akurat.

**Fitur**
- **Surat Masuk:** Fitur ini memungkinkan instansi untuk mengelola dan mencatat setiap surat yang masuk dengan detail yang lengkap. Setiap surat yang diterima akan didokumentasikan untuk evaluasi dan monitoring.
- **Surat Keluar:** Fitur ini khusus untuk mencatat dan mengelola surat-surat yang dikeluarkan oleh instansi. Semua surat keluar akan didokumentasikan untuk kebutuhan administrasi dan pelaporan.
- **Arsip Surat:** Fitur ini mendukung pengarsipan surat secara digital, membantu dalam penyimpanan dan pencarian surat-surat terdahulu untuk referensi dan evaluasi.

**Peran**
- **Administrator**: Bertanggung jawab mengelola seluruh sistem aplikasi Surat. Mereka memiliki akses penuh untuk konfigurasi, manajemen pengguna, serta pemeliharaan data dan sistem. Administrator juga bertugas memastikan semua fitur berjalan dengan baik dan melakukan pembaruan jika diperlukan.
- **Sekretaris**: Memiliki peran penting dalam mengelola dan memantau surat masuk dan keluar. Mereka bertugas untuk memasukkan dan memverifikasi data surat, memberikan catatan penting, serta mencetak laporan surat.
- **Pegawai**: Bertugas memberikan informasi terkait surat yang masuk dan keluar. Mereka memasukkan data harian dan kegiatan surat-menyurat lainnya ke dalam aplikasi Surat.

**Persyaratan**
- **Web Server**
- **PHP 8.3**
- **MySQL**
- **Composer**
- **Git**
- **Kerangka Kerja:** Laravel

**Instalasi**
Berikut adalah langkah-langkah untuk menginstal aplikasi Surat:

1. **Clone repositori:**
   ```sh
   git clone https://github.com/zulfikriyahya/e-surat.git
   ```

2. **Masuk ke direktori proyek:**
   ```sh
   cd sdit-surat
   ```

3. **Instal dependensi menggunakan Composer:**
   ```sh
   composer install
   ```

4. **Salin file konfigurasi:**
   ```sh
   cp .env-example .env
   ```

5. **Generate kunci aplikasi:**
   ```sh
   php artisan key:generate
   ```

6. **Migrasi database:**
   ```sh
   php artisan migrate:fresh
   ```

7. **Buat pengguna Filament:**
   ```sh
   php artisan make:filament-user
   ```

8. **Jalankan server aplikasi:**
   ```sh
   php artisan serve
   ```

Setelah mengikuti langkah-langkah di atas, aplikasi Surat siap digunakan. Pastikan semua konfigurasi dan dependensi telah terinstal dengan benar.

**Lisensi**
Surat adalah perangkat lunak sumber terbuka yang dilisensikan di bawah lisensi MIT.
