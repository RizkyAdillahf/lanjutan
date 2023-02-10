<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $fillable = [
        'tanggal_bayar',
        'bulan_bayar',
        'tahun_bayar',
        'users_id',
        'siswas_i',
        'spps_id'
    ];
    public function user()
    {
        return $this->belongTo('App\Models\User', 'id', 'Users_id');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'id', 'Siswas_id');
    }
    public function spp()
    {
        return $this->belongTo('App\Models\Spp', 'id', 'Spps_id');
    }
}
