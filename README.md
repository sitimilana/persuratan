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
   <img width="1905" height="956" alt="image" src="https://github.com/user-attachments/assets/a70fed7b-3b88-40d9-bf82-2d7b40d68124" />
   


