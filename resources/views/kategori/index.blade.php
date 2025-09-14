@extends('layouts.app') {{-- Ganti jika nama layout Anda berbeda --}}

@section('content')
<div class="content-card">
    <h1 class="h2">Kategori Surat</h1>
    <p class="text-muted">
        Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.
        Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.
    </p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('kategori.index') }}" method="GET" class="mb-4 mt-4">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control" name="search" placeholder="Cari kategori..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari!</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID Kategori</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoriList as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>{{ $kategori->keterangan }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Link Paginasi --}}
    <div class="mt-3">
        {{ $kategoriList->appends(request()->query())->links() }}
    </div>

    <a href="{{ route('kategori.create') }}" class="btn btn-success mt-3">
        <i class="bi bi-plus-lg"></i> Tambah Kategori Baru...
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const form = this.closest('form');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Kategori yang dihapus tidak dapat dikembalikan!",
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
@endsection