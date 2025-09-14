@extends('layouts.app') {{-- Memberitahu file ini untuk memakai layout utama --}}

@section('title', 'Arsip Surat') {{-- Mengisi judul halaman --}}

@section('content') {{-- Memulai bagian konten yang akan diisi ke @yield('content') --}}
<div class="content-card">
    <h1 class="h2">Arsip Surat</h1>
    <p class="text-muted">
        Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.
        Klik "Lihat" pada kolom aksi untuk menampilkan surat.
    </p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form class="mb-4 mt-4" action="{{ route('arsip.index') }}" method="GET">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control" name="search" placeholder="Cari surat..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari!</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Waktu Pengarsipan</th>
                    <th scope="col" class="aksi-column">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suratList as $surat)
                <tr>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->kategori->nama_kategori }}</td>
                    <td>{{ $surat->judul }}</td>
                    <td>{{ $surat->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <form action="{{ route('arsip.destroy', $surat->id) }}" method="POST" class="d-inline form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        <a href="{{ route('arsip.unduh', $surat->id) }}" class="btn btn-warning btn-sm">Unduh</a>
                        <a href="{{ route('arsip.show', $surat->id) }}" class="btn btn-info btn-sm text-white">Lihat</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data surat yang diarsipkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    {{-- Link Paginasi jika ada --}}
    @if(method_exists($suratList, 'links'))
       {{ $suratList->appends(request()->query())->links() }}
    @endif

    <a href="{{ route('arsip.create') }}" class="btn btn-primary btn-arsip mt-3">
        <i class="bi bi-archive-fill me-2"></i>Arsipkan Surat..
    </a>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.form-delete').forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan arsip surat ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush