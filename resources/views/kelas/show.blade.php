@extends('template.master')

@section('judul')
    <h1>Halaman Detail</h1>
@endsection

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail kelas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="kelas/create" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="input_nama_kelas">nama_kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" id="inputnama_kelas" value="{{ $kelas->nama_kelas }}" disabled  >
                  </div>
                <div class="form-group">
                    <label for="input_kompetensi_keahlian">kompetensi_keahlian</label>
                    <input type="text" name="kompetensi_keahlian" class="form-control" id="input_kompetensi_keahlian" value="{{ $kelas->kompetensi_keahlian }}" disabled>
                  </div>
                  <div class="card-footer">
                <a class="btn btn-primary" href="/kelas">Back</a>
                </div>
</form>
@endsection