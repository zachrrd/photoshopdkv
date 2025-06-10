<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // PASTIKAN BARIS INI ADA!

class Foto extends Model
{
    protected $table = 'foto';

    protected $fillable = [
        'user_id',
        'judul_foto',
        'deskripsi',
        'kategori',
        'ukuran',
        'harga',
        'stok',
        'file_path',
        'tgl_upload',
        'status',
    ];

    /**
     * Get the user that owns the Foto.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}