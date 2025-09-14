@extends('layouts.app') {{-- Menggunakan layout utama yang sudah kita buat --}}

@section('title', 'About') {{-- Mengubah judul halaman --}}

@section('content')
<div class="content-card">
    <h1 class="h2">About</h1>
    <hr>

    <div class="row mt-4">
        {{-- Kolom untuk Foto --}}
        <div class="col-md-4 text-center">
            <img src="{{ asset('image/tari.jpg') }}" 
                class="img-fluid rounded-circle shadow-sm" 
                alt="Foto Profil" 
                style="max-width: 200px;">
        </div>

        {{-- Kolom untuk Informasi Teks --}}
        <div class="col-md-8">
            <p>Aplikasi ini dibuat oleh:</p>
            
            <table class="table table-borderless">
                <tr>
                    <td style="width: 100px;"><strong>Nama</strong></td>
                    <td>: Siti Milana Puji Lestari</td>
                </tr>
                <tr>
                    <td><strong>Prodi</strong></td>
                    <td>: D3-Manajemen Informatika Polinema PSDKU Kediri</td>
                </tr>
                <tr>
                    <td><strong>NIM</strong></td>
                    <td>: 2331730140</td>
                </tr>
                <tr>
                    <td><strong>Tanggal</strong></td>
                    <td>: {{ \Carbon\Carbon::parse('2025-09-13')->isoFormat('D MMMM Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection