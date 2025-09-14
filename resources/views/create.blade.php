<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Surat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { background-color: #f0f2f5; }
        .sidebar { background-color: #2c3e50; min-height: 100vh; color: white; }
        .sidebar .nav-link { color: #bdc3c7; font-size: 1.1rem; padding: 1rem; display: flex; align-items: center; }
        .sidebar .nav-link .bi { margin-right: 15px; font-size: 1.3rem; }
        .sidebar .nav-link:hover { background-color: #34495e; color: #ffffff; }
        .sidebar .nav-link.active { background-color: #0d6efd; color: #ffffff; font-weight: bold; }
        .sidebar h2 { padding: 1.5rem 1rem; border-bottom: 1px solid #4a627a; margin-bottom: 1rem; }
        .main-content { padding: 30px; }
        .content-card { background-color: #ffffff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky">
                <h2>ArsipId</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('arsip.index') }}">
                            <i class="bi bi-star-fill"></i> Arsip
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-folder-fill"></i> Kategori Surat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-info-circle-fill"></i> About
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
            <div class="content-card">
                <h1 class="h2">Unggah Surat</h1>
                <p class="text-muted">
                    Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
                    <small>Catatan: Gunakan file berformat PDF</small>
                </p>
                <hr>

                <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <div class="row mb-3">
                        <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}">
                            @error('nomor_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-4">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id">
                                <option selected disabled>Pilih Kategori...</option>
                                @foreach ($kategoriList as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                             @error('kategori_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="file_surat" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                        <div class="col-sm-6">
                            <input class="form-control @error('file_surat') is-invalid @enderror" type="file" id="file_surat" name="file_surat">
                            @error('file_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-10 offset-sm-2">
                             <a href="{{ route('arsip.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>