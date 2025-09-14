<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# ArsipId - Aplikasi Arsip Surat Digital

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

ArsipId adalah aplikasi berbasis web yang dikembangkan untuk membantu proses pengarsipan surat-menyurat secara digital.

##  Tujuan Aplikasi

Aplikasi ini dirancang untuk memenuhi kebutuhan akan sistem pengelolaan arsip yang modern dan efisien, studi kasus pada Kelurahan Karangduren, Kecamatan Pakisaji. Tujuannya adalah untuk menggantikan sistem pengarsipan manual yang memakan waktu dan rentan terhadap kehilangan data. Dengan ArsipId, petugas kelurahan dapat dengan mudah mengunggah, mencari, melihat kembali, dan mengunduh surat-surat resmi dalam format PDF.

## Fitur Aplikasi

Aplikasi ini dilengkapi dengan berbagai fitur untuk memudahkan pengelolaan arsip surat:

#### Manajemen Arsip Surat
- **Unggah Arsip Baru**: Mengunggah file surat (PDF) beserta data detailnya seperti Nomor Surat, Judul, dan Kategori.
- **Daftar Arsip**: Menampilkan semua surat yang telah diarsipkan dalam format tabel yang mudah dibaca dan dilengkapi dengan paginasi.
- **Pencarian Cerdas**: Melakukan pencarian surat berdasarkan Judul atau Nomor Surat.
- **Lihat Detail & Pratinjau**: Menampilkan detail lengkap dari sebuah surat beserta pratinjau (embed) dokumen PDF langsung di browser.
- **Unduh Dokumen**: Mengunduh file PDF asli dari surat yang tersimpan.
- **Edit Data Arsip**: Mengubah detail surat atau mengganti file PDF yang sudah diunggah.
- **Hapus Arsip**: Menghapus data arsip beserta file fisiknya dengan dialog konfirmasi yang aman.

#### Manajemen Kategori Surat
- **CRUD Kategori**: Fitur lengkap untuk Menambah, Melihat, Mengedit, dan Menghapus (CRUD) data Kategori Surat.
- **Pencarian Kategori**: Melakukan pencarian berdasarkan Nama atau Keterangan Kategori.
- **Validasi Keamanan**: Sistem akan menolak penghapusan kategori jika kategori tersebut masih digunakan oleh salah satu arsip surat.

#### Lainnya
- **Halaman About**: Halaman statis yang berisi informasi mengenai pembuat aplikasi.
- **Antarmuka Responsif**: Dibangun dengan Bootstrap 5, memastikan tampilan tetap optimal di berbagai ukuran layar.

## Cara Menjalankan Aplikasi

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan pengembangan lokal.

#### Prasyarat
- PHP 8.1+
- Composer
- Node.js & NPM
- Web Server (Contoh: Laragon, XAMPP)
- Database (MySQL)

#### Langkah-langkah Instalasi
1.  **Clone repository ini:**
    ```bash
    git clone [URL_REPOSITORY_ANDA]
    ```

2.  **Masuk ke direktori proyek:**
    ```bash
    cd ArsipId
    ```

3.  **Install dependensi PHP:**
    ```bash
    composer install
    ```

4.  **Install dependensi JavaScript:**
    ```bash
    npm install
    ```

5.  **Salin file environment:**
    ```bash
    cp .env.example .env
    ```

6.  **Generate key aplikasi:**
    ```bash
    php artisan key:generate
    ```

7.  **Konfigurasi database Anda di file `.env`:**
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_persuratan
    DB_USERNAME=root
    DB_PASSWORD=
    ```

8.  **Jalankan migrasi database (dan seeder jika ada):**
    Perintah ini akan membuat semua tabel yang dibutuhkan di database Anda.
    ```bash
    php artisan migrate:fresh --seed
    ```

9.  **Buat symbolic link untuk folder storage:**
    Ini sangat penting agar file PDF yang diunggah bisa diakses.
    ```bash
    php artisan storage:link
    ```

10. **Jalankan server pengembangan:**
    - Di terminal pertama, jalankan server backend Laravel:
      ```bash
      php artisan serve
      ```
    - Di terminal kedua, jalankan server frontend Vite:
      ```bash
      npm run dev
      ```

11. **Buka aplikasi:**
    Buka browser Anda dan kunjungi `http://127.0.0.1:8000`.

## Screenshot

Berikut adalah tampilan dari halaman utama aplikasi ArsipId.

## Halaman Utama
   <img width="940" height="442" alt="image" src="https://github.com/user-attachments/assets/8e7d83c0-c559-4e07-b616-e50e2a310dd6" />

## Halaman Arsip Surat
<img width="940" height="441" alt="image" src="https://github.com/user-attachments/assets/d41d7564-29f3-4259-83d6-3d554dae2243" />

## Konfirmasi Hapus Surat
<img width="940" height="444" alt="image" src="https://github.com/user-attachments/assets/7184edd1-780c-4c2d-9a1a-99404f4ba15c" />

## Unduh Surat
<img width="404" height="391" alt="image" src="https://github.com/user-attachments/assets/9ddd84d7-7097-403e-aec1-42d7ac49d599" />

## Halaman Lihat Surat
<img width="940" height="443" alt="image" src="https://github.com/user-attachments/assets/feb3922d-b506-424a-bf87-9dc8c4b233fa" />

## Halaman Kategori Surat
<img width="940" height="444" alt="image" src="https://github.com/user-attachments/assets/3bbf36fc-f85b-45a4-91bf-c2bdf7795e29" />

## Halaman Tambah Kategori Baru
<img width="940" height="442" alt="image" src="https://github.com/user-attachments/assets/891fd5d1-920b-4ed1-b06a-5bd625f6fc70" />

## Halaman Edit Kategori
<img width="940" height="443" alt="image" src="https://github.com/user-attachments/assets/18d32059-ea51-4d32-9e7d-dfd6d6b848e3" />

## Konfigurasi Hapus Kategori
<img width="940" height="444" alt="image" src="https://github.com/user-attachments/assets/95ce2a3d-5df9-4088-ab7e-377728387da2" />

## Halaman About
<img width="940" height="444" alt="image" src="https://github.com/user-attachments/assets/336e3a52-4730-4a54-9536-43728ffb09bd" />

