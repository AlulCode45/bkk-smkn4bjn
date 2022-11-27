@extends('Template.app')
@section('title', 'Daftar lowongan')
@section('name-page', 'Daftar lowongan')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="lowongan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Perusahaan</th>
                            <th>Gaji</th>
                            <th>Lokasi</th>
                            <th>Penempatan</th>
                            <th>Deadline</th>
                            <th>Status Lamaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lowongan as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->judul }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->gaji }}</td>
                                <td>{{ $d->lokasi }}</td>
                                <td>{{ $d->penempatan }}</td>
                                <td>{{ $d->tanggal }}</td>
                                <td>
                                    @if (\App\Models\PelamarModel::where([
                                        'id_lowongan' => $d->id,
                                        'id_user' => Auth::user()->id,
                                    ])->first() ==
                                        null or
                                        \App\Models\PelamarModel::where([
                                            'id_lowongan' => $d->id,
                                            'id_user' => Auth::user()->id,
                                        ])->first()->status ==
                                            0)
                                        <span class="badge badge-secondary p-2">Belum Melamar</span>
                                    @elseif (\App\Models\PelamarModel::where([
                                        'id_lowongan' => $d->id,
                                        'id_user' => Auth::user()->id,
                                    ])->first()->status == 1)
                                        <span class="badge badge-warning text-white p-2">Menunggu Konfirmasi</span>
                                    @elseif (\App\Models\PelamarModel::where([
                                        'id_lowongan' => $d->id,
                                        'id_user' => Auth::user()->id,
                                    ])->first()->status == 2)
                                        <span class="badge badge-success p-2">Lamaran Diterima</span>
                                    @elseif (\App\Models\PelamarModel::where([
                                        'id_lowongan' => $d->id,
                                        'id_user' => Auth::user()->id,
                                    ])->first()->status == 3)
                                        <span class="badge badge-danger p-2">Lamaran Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('siswa.viewLowongan', $d->id) }}" class="btn btn-primary m-1"><i
                                            class="fa fa-eye"></i></a>
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
            $('#lowongan').DataTable();
        });
    </script>
@endsection
