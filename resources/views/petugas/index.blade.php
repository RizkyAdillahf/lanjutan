@extends('template.master')

@section('judul')
    <h1>Halaman Kelas</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
      <h3 class="card-title">Data Petugas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <a href="{{ route('petugas.create') }}" class="btn btn-primary">
          <i class="fas fa-plus-square"></i>
        Tambah   
        </a>
        <br>
        </tr>
        <br>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Petugas</th>
          <th>Username</th>
          <th>Level</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @forelse($petugas as $value)
         <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $value->nama_petugas }}</td>
          <td>{{ $value->username }}</td>
          <td>{{ $value->level }}</td>

          <td>
          <form action="{{ route ('petugas.destroy', [$petugas->id])}}" method="POST">
              <a class="btn btn-info mr-3" href="petugas/{{$petugas->id}}">
              <i class="fas fas fa-exclamation-circle"></i> Detail</a> 
              <a class="btn btn-warning mr-3" href="petugas/{{$value->id}}/edit">
              <i class="fas fa-edit	"></i> Edit</a>
              <form action="/petugas/{{$value->id}}" method="POST">
            @csrf
            @method('DELETE')
           <button type="submit" class="btn btn-danger" value="Delete">
           <i class="far fa-trash-alt"></i> 
           Delete
          </button>
          </form>
            </td>
         </tr>
         @empty
         <tr>
          <td>Data Masih Kosong</td>
        </tr>

        @endforelse
      </table>
    </div>
    <!-- /.card-body -->
  
@endsection