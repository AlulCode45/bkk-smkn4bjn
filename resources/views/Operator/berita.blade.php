@extends('Template.app')
@section('title', 'Daftar Berita')
@section('name-page', 'Daftar Berita')

@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6">
                    <h3>Kelola Berita</h3>
                </div>
                <div class="col-6 d-flex">
                    <div class="ml-auto">
                        <a class="btn btn-success rounded rounded-pill" href="{{ route('operator.tambahBerita') }}">Tambah
                            Berita</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="berita">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Pembuat</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_berita as $berita)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ substr($berita->isi, 0, 100) }}</td>
                                <td>{{ \App\Models\User::find($berita->id_user) == null ? '-' : \App\Models\User::find($berita->id_user)->name }}
                                </td>
                                <td>{{ $berita->created_at }}</td>
                                <td>
                                    <a href="" class="btn btn-success m-1"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('operator.editBerita', $berita->id) }}" class="btn btn-primary m-1"><i
                                            class="fa fa-pencil-alt"></i></a>
                                    <a href="{{ route('operator.hapusBerita', $berita->id) }}" class="btn btn-danger m-1"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function() {
            $('#berita').DataTable();
        });
    </script>
@endsection
