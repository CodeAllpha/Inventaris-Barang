<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;


    protected $table = "inventaris";

    protected $hidden = ["id_inventaris"];


    protected $fillable = [

        'nama',
        'kondisi',
        'keterangan',
        'jumlah',
        'kode_inventaris',
        'tanggal_register',
        'photo_barang',
        'id_jenis',
        'id_ruang',
        'id_petugas',
    ];

    public function ruang()
    {
        return $this->belongsTo('\App\Models\Ruang', 'id_ruang', 'id');
    }

    public function jenis()
    {
        return $this->belongsTo('\App\Models\Jenis', 'id_jenis', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo('\App\Models\Petugas', 'id_petugas', 'id');
    }
    public function peminjaman()
    {
        return $this->hasMany('\App\Models\Peminjaman', 'id_peminjaman', 'id');
    }

}
