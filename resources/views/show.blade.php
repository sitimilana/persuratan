<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f0f2f5; }
        .sidebar { background-color: #2c3e50; min-height: 100vh; color: white; }
        .sidebar .nav-link { color: #bdc3c7; }
        .sidebar .nav-link.active { background-color: #0d6efd; color: #ffffff; }
        .main-content { padding: 30px; }
        .content-card { background-color: #ffffff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); }
        .pdf-viewer {
            width: 100%;
            height: 600px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-3">
                <h2>ArsipId</h2>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('arsip.index') }}"><i class="bi bi-star-fill"></i> Arsip</a></li>
                    </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
            <div class="content-card">
                <h1 class="h2">Preview Surat</h1>
                <hr>
                <p><strong>Nomor:</strong> {{ $arsip->nomor_surat }}</p>
                <p><strong>Kategori:</strong> {{ $arsip->kategori->nama_kategori }}</p>
                <p><strong>Judul:</strong> {{ $arsip->judul }}</p>
                <p><strong>Waktu Unggah:</strong> {{ $arsip->created_at->format('Y-m-d H:i:s') }}</p>

                <div class="mt-4 mb-4">
                    <iframe class="pdf-viewer" src="{{ asset('storage/' . $arsip->file_path) }}"></iframe>
                </div>

                <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
                <a href="{{ route('arsip.unduh', $arsip->id) }}" class="btn btn-warning">Unduh</a>
                <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-primary">Edit/Ganti File</a>
            </div>
        </main>
    </div>
</div>

</body>
</html>