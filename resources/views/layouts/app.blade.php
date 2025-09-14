<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul halaman bisa dibuat dinamis --}}
    <title>@yield('title', 'Arsip Surat')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { 
            background-color: #f0f2f5; 
        }
        .sidebar { 
            background-color: #2c3e50; 
            min-height: 100vh; 
            color: white; 
        }
        .sidebar .nav-link { 
            color: #bdc3c7; 
            font-size: 1.1rem; 
            padding: 1rem; 
            display: flex; 
            align-items: center; 
        }
        .sidebar .nav-link .bi { 
            margin-right: 15px; 
            font-size: 1.3rem; 
        }
        .sidebar .nav-link:hover { 
            background-color: #34495e; 
            color: #ffffff; 
        }
        .sidebar .nav-link.active { 
            background-color: #0d6efd; 
            color: #ffffff; 
            font-weight: bold; 
        }
        .sidebar h2 { 
            padding: 1.5rem 1rem; 
            border-bottom: 1px solid #4a627a; 
            margin-bottom: 1rem; 
        }
        .main-content { 
            padding: 30px; 
        }
        .content-card { 
            background-color: #ffffff; 
            padding: 25px; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.05); 
        }
        .table thead th { 
            background-color: #e9ecef; 
            font-weight: 600; 
        }
        .table .aksi-column { 
            width: 230px; 
        }
        .table .aksi-column .btn { 
            margin-right: 5px; 
        }
        .btn-arsip { 
            font-size: 1.1rem; 
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        {{-- SIDEBAR --}}
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky">
                <h2>ArsipId</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('arsip.*') ? 'active' : '' }}" href="{{ route('arsip.index') }}">
                            <i class="bi bi-star-fill"></i> Arsip
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                            <i class="bi bi-folder-fill"></i> Kategori Surat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="bi bi-info-circle-fill"></i> About
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Ini adalah area konten utama yang akan berubah-ubah --}}
        <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
            @yield('content') {{-- Di sinilah konten dinamis akan ditampilkan --}}
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{{-- Script spesifik per halaman bisa diletakkan di sini --}}
@stack('scripts')
</body>
</html>