@extends('template.master')

@section('judul')
    <h1>Edit Data</h1>
@endsection

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/kelas/{{ $kelas->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="input_nama_kelas">nama kelas</label>
                    <input type="number" name="nama_kelas" class="form-control" id="input_nama_kelas" value="{{ $kelas->nama_kelas }}">
                  </div>
                  <div class="form-group">
                    <label for="input_kompetensi_keahlian">kompetensi keahlian</label>
                    <input type="number" name="kompetensi_keahlian" class="form-control" id="input_kompetensi_keahlian" value="{{ $kelas->kompetensi_keahlian }}">
                  </div>