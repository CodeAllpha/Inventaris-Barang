<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory,Notifiable;

    

    protected $fillable = [
        'nama_petugas',
        'username',
        'level',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function inventaris(){
        return $this->hasMany(Inventaris::class,'id_petugas', 'id');
    }
}
