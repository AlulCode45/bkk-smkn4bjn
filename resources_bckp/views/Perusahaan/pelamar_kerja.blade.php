@extends('Template.app')
@section('title', 'Pelamar Kerja')
@section('name-page', 'Pelamar Kerja')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <h2>Data Pelamar Kerja</h2>
            <div class="table-responsive">
                <table class="table" id="data-pelamar">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Lowongan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelamar as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama_siswa }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->no_telp }}</td>
                                <td>{{ $d->judul }}</td>
                                <td>
                                    @if ($d->status == 1)
                                        <span class="badge badge-warning text-white">Menunggu</span>
                                    @elseif($d->status == 2)
                                        <span class="badge badge-success">Diterima</span>
                                    @else
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{ route('perusahaan.viewPelamarKerja', ['id_lowongan' => $d->id_lowongan, 'id_user' => $d->id_user]) }}">
                                        Lihat Informasi Lamaran
                                    </a>
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
            $('#data-pelamar').DataTable();
        });
    </script>
@endsection
