<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama_ruang',
        'kode_ruang',
        'keterangan',
        
    ];

    public $table = "ruang";

    protected $hidden = ["id_ruang"];

    public function inventaris(){
        return $this->hasMany(Inventaris::class,'id_ruang', 'id');
    }
}
