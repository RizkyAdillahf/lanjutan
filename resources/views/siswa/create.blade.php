@extends('template.master')

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('siswa.index')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputid">Nisn</label>
                    <input type="integer" name="nisn" class="form-control" id="inputNisn" placeholder="Nisn">
                  </div>
                  <div class="form-group">
                    <label for="inputNamaKelas">Nis</label>
                    <input type="text" name="nis" class="form-control" id="inputNis" placeholder="Nis">
                  </div>
                  <div class="form-group">
                    <label for="inputJurusan">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Alamat">
                  </div>
                  <div class="form-group">
                    <label for="inputJurusan">No_telp</label>
                    <input type="text" name="no_telp" class="form-control" id="inputNo_telp" placeholder="No_telp">
                  </div>
                  <div class="form-group">
                  <label>Nama Kelas</label>
                <select class="form-control" name="kelas_id" id="kelas_id">
                 <option disable selected> --Silahkan Pilih Kelas-- </option>
                 <option value="XII">XII RPL 1</option>
                 <option value="XII">XII RPL 2</option>
                 <option value="XII">XII RPL 3</option>
                </select>
                  </div>
                  <div class="card-body">
            <div class="form-group" >
            <select class="form-select" aria-label="Default select example" name="spps_id" >
            <option selected>Open this select menu</option>
            @foreach ($spp as $item)
            <option value="{{ $item->id}}">{{ $item->id }}</option>
            @endforeach
            </select>
           </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection