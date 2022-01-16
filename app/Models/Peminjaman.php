<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;


    protected $table = "peminjaman";

    protected $hidden = ["id_peminjaman"];

    protected $fillable = [

        'nama_barang',          // Nama Barang Yang Di Pinjam
        'peminjam',             // User ( Petugas / Pegawai )
        'tanggal_pinjam',       // Now
        'tanggal_kembali',      // Custom Tanggal Mengembalikan Max 3 Hari
        'status_peminjaman',    // Default Pending
        'jumlah_pinjam',        // Maks -> Stock Barang Di Inventaris
        'id_inventaris',
        'id_pegawai',
        'id_petugas',
    ];

    public function inventaris()
    {
        return $this->belongsTo('\App\Models\Inventaris', 'id_inventaris', 'id');
    }

    public function pegawai()
    {
        return $this->belongsTo('\App\Models\Pegawai', 'id_pegawai', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo('\App\Models\Petugas', 'id_petugas', 'id');
    }
}
