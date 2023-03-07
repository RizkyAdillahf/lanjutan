<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('siswa.index', compact('siswa','spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelas = Kelas::all();
        $spps = Spp::all();
        return view('siswa.create', compact('kelas','spps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pembayaran $pembayaran)
    {
        //
        $request->validate([
            'nisn'  => 'required',
            'nis'  => 'required',
            'nama'  => 'required',
            'alamat'  => 'required',
            'no_telp'  => 'required',
            'kelas_id'  => 'required',
            'spps_id'  => 'required'
        ]);
       
        siswa::create([
            'nisn'  => $request-> nisn,
            'nis'  => $request-> nis,
            'nama'  => $request-> nama,
            'alamat'  => $request-> alamat,
            'no_telp'  => $request-> no_telp,
            'kelas_id'  => $request-> kelas_id,
            'spps_id'  => $request-> spps_id,
        ]);
        return redirect()->route('siswa.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa, kelas $kelas)
    {
        //
        $kelas = kelas::all();
        $pembayarans = Pembayaran::all();
        $siswa = Siswa::find($siswa->id);
        return view('siswa.show', compact('siswa','pembayarans','kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
        $siswa = Siswa::find($siswa->id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'kelas_id' => 'required',
            'spps_id' => 'required'
        ]);
        $siswa = Siswa::find($siswa->id);
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->spps_id = $request->spps_id;
        $siswa->update();

        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
        $siswa = Siswa::find($siswa->id);
        $siswa->delete();
        return redirect('/siswa');
    }
}
