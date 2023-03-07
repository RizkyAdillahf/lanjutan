<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Siswa $siswa, Spp $spp)
    {
        //
        $siswa = Siswa::find($siswa->id);
        $users = User::all();
        $spps = Spp::all();
        return view('pembayaran.create', compact('siswa','spps')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Siswa $siswa, Spp $spp)
    {
        //
        $request->validate([
            'tanggal_bayar' => 'required',
            'bulan_bayar' => 'required',
            'tahun_bayar' => 'required',
            'jumlah_bayar' => 'required'
        ]);
        Pembayaran::create([
            'users_id' => Auth::user()->id,
            'siswas_id' => '1',
            'spps_id' => '1',
            'tanggal_bayar' => $request->tanggal_bayar,
            'bulan_bayar' => $request->bulan_bayar,
            'tahun_bayar' => $request->tahun_bayar,
            'jumlah_bayar'=> $request->jumlah_bayar,
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
