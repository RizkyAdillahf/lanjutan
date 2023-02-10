<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'tahun',
        'nomminal'
    ];

    public function siswa()
    {
        return $this->hasMany('App\Models\Siswa');
    }
    public function Pembayaran()
    {
        return $this->hasMany('App\Models\Pembayaran');
    }
}
