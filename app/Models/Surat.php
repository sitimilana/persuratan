<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Surat extends Model
{
    use HasFactory;
    protected $fillable = ['nomor_surat', 'judul', 'kategori_id', 'file_path'];

    // Satu surat hanya milik satu kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
