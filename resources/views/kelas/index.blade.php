@extends('template.master')

@section('content')
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Halaman Data Kelas</h3>
    </div>
      <div class="card-body">
      <div class="card-body">
        <a href="{{ route('kelas.create') }}" class="btn btn-primary">
          @csrf
          <i class="fas fa-plus"></i>
          Tambah Data Kelas
        </a>
      </div>
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nama Kelas</th>
            <th>Kompetensi Keahlian</th>
          </tr>
          </thead>
        </table>
        <tbody>
          @forelse($kelas as $kelas)
         <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $kelas->nama_kelas }}</td>
          <td>{{ $kelas->kompetensi_keahlian }}</td>
          <td>
          <form action="{{ route ('kelas.destroy', [$kelas->id])}}" method="POST">
              <a class="btn btn-info mr-3" href="kelas/{{$kelas->id}}">
              <i class="fas fas fa-exclamation-circle"></i> Detail</a> 
              <a class="btn btn-warning mr-3" href="kelas/{{$kelas->id}}/edit">
              <i class="fas fa-edit	"></i> Edit</a>
              <form action="/kelas/{{$kelas->id}}" method="POST">
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