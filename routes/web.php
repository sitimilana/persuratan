<?php

use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;


// Jadikan halaman utama adalah daftar arsip surat
Route::get('/', [SuratController::class, 'index'])->name('surat.index');

// Resource route untuk semua fungsi CRUD Arsip Surat
Route::resource('surat', SuratController::class)->except(['index']);

// Tambahkan route khusus untuk download dan search
Route::get('surat/{surat}/unduh', [SuratController::class, 'unduh'])->name('surat.unduh');
Route::get('/search', [SuratController::class, 'search'])->name('surat.search');


// Resource route untuk semua fungsi CRUD Kategori
Route::resource('kategori', KategoriController::class);

// Route untuk halaman About
Route::get('/about', function () {
    return view('about'); // Kita akan buat view 'about.blade.php'
})->name('about');


Route::resource('arsip', ArsipController::class);
Route::get('/', function () {
    return redirect()->route('arsip.index');
});

Route::get('arsip/{arsip}/unduh', [ArsipController::class, 'unduh'])->name('arsip.unduh');

Route::resource('kategori', KategoriController::class);

Route::get('/about', function () {
    return view('about');
})->name('about');