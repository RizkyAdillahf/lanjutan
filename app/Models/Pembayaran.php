<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;   
use App\Models\User;
use App\Models\Spp;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $fillable = [
        'tanggal_bayar',
        'bulan_bayar',
        'tahun_bayar',
        'users_id',
        'siswas_id',
        'spps_id',
        'jumlah_bayar',
    ];
    public function user()
    {
        return $this->belongTo('App\Models\User', 'id', 'users_id');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'id', 'siswas_id');
    }
    public function spp()
    {
        return $this->belongTo('App\Models\Spp', 'id', 'spps_id');
    }
}
