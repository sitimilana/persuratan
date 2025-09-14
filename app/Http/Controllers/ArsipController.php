<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArsipController extends Controller
{
    /**
     * Menampilkan halaman utama arsip surat.
     */
    // app/Http/Controllers/ArsipController.php

    public function index(Request $request) // 1. Terima objek Request
    {
        // 2. Ambil nilai dari input 'search' di URL, jika ada.
        $search = $request->input('search');

        // 3. Buat query dasar untuk mengambil surat beserta relasi kategorinya.
        // Kita tidak langsung ->get() atau ->paginate() di sini.
        $query = Surat::with('kategori');

        // 4. Jika ada input pencarian ($search tidak kosong)
        if ($search) {
            // Tambahkan kondisi WHERE ke dalam query.
            // Cari berdasarkan 'judul' ATAU 'nomor_surat'.
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('nomor_surat', 'like', "%{$search}%");
        }

        // 5. Setelah query selesai dibangun (dengan atau tanpa WHERE),
        // urutkan dari yang terbaru dan ambil hasilnya dengan paginasi.
        $suratList = $query->latest()->paginate(10); // Mengambil 10 data per halaman

        // 6. Kirim data yang sudah difilter dan dipaginasi ke view.
        return view('home', compact('suratList'));
    }

    public function create()
    {
        // Ambil semua data kategori untuk ditampilkan di dropdown
        $kategoriList = Kategori::all();

        return view('create', compact('kategoriList'));
    }
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'file_surat'  => 'required|file|mimes:pdf|max:2048', // Wajib file, harus PDF, maks 2MB
        ]);

        // 2. Simpan File PDF
        $file = $request->file('file_surat');
        // Buat nama file unik dengan menambahkan timestamp
        $fileName = time() . '_' . $file->getClientOriginalName();
        // Simpan file ke folder 'public/pdfs'
        $filePath = $file->storeAs('pdfs', $fileName, 'public');

        // 3. Simpan Data ke Database
        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'file_path'   => $filePath,
        ]);

        // 4. Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('arsip.index')->with('success', 'Surat berhasil diarsipkan!');
    }
    public function destroy(Surat $arsip) // Laravel akan otomatis mencari data Surat berdasarkan ID
    {
        // 1. Hapus file fisik dari storage
        // Pastikan path diawali dengan 'public/' karena kita menyimpannya di public disk
        if (Storage::disk('public')->exists($arsip->file_path)) {
            Storage::disk('public')->delete($arsip->file_path);
        }

        // 2. Hapus record dari database
        $arsip->delete();

        // 3. Redirect kembali ke halaman utama dengan pesan sukses
        return redirect()->route('arsip.index')->with('success', 'Data surat berhasil dihapus!');
    }
    public function show(Surat $arsip)
    {
        // Langsung kirim data surat yang ditemukan ke view 'show.blade.php'
        return view('show', compact('arsip'));
    }
    public function unduh(Surat $arsip)
    {
        // Membuat path lengkap ke file di dalam folder storage
        $filePath = storage_path('app/public/' . $arsip->file_path);

        // Cek jika file benar-benar ada sebelum mencoba mengunduh
        if (!file_exists($filePath)) {
            return redirect()->route('arsip.index')->with('error', 'File tidak ditemukan!');
        }

        // Menggunakan helper response() untuk membuat response download
        return response()->download($filePath);
    }
     /**
     * Tampilkan form untuk mengedit surat.
     */
    public function edit(Surat $arsip)
    {
        $kategoriList = Kategori::all();
        return view('edit', compact('arsip', 'kategoriList'));
    }

    /**
     * Update data surat di database. (Akan kita butuhkan untuk form edit)
     */
    public function update(Request $request, Surat $arsip)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255|unique:surats,nomor_surat,' . $arsip->id,
            'kategori_id' => 'required|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'file_surat'  => 'nullable|file|mimes:pdf|max:2048', // File tidak wajib diisi saat update
        ]);

        $dataToUpdate = $request->except('file_surat');

        // Jika ada file baru yang diunggah
        if ($request->hasFile('file_surat')) {
            // Hapus file lama
            if (Storage::disk('public')->exists($arsip->file_path)) {
                Storage::disk('public')->delete($arsip->file_path);
            }

            // Simpan file baru
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('pdfs', $fileName, 'public');
            $dataToUpdate['file_path'] = $filePath;
        }

        $arsip->update($dataToUpdate);

        return redirect()->route('arsip.index')->with('success', 'Data surat berhasil diperbarui!');
    }

}