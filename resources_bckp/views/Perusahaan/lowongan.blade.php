@extends('Template.app')
@section('title', 'Lowongan')
@section('name-page', 'Lowongan')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <div class="row row-cols-2 mb-4">
                <div class="col">
                    <h2>Data Lowongan</h2>
                </div>
                <div class="col d-flex">
                    <button data-toggle="modal" data-target="#tambahLowongan"
                        class="btn btn-success ml-auto rounded rounded-pill">Tambah Lowongan</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="data-lowongan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Perusahaan</th>
                            <th>Lokasi</th>
                            <th>Penempatan</th>
                            <th>Deadline</th>
                            <th>Aksi</th>
                            <th>Status Lowongan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lowongan as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->judul }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->lokasi }}</td>
                                <td>{{ $d->penempatan }}</td>
                                <td>{{ $d->tanggal }}</td>
                                @if ($d->status == 1)
                                    <td>
                                        <span class="badge badge-success">Aktif</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ route('perusahaan.pelamarKerja', $d->id_lowongan) }}"
                                        class="btn btn-primary m-1" data-toggle="tooltip" data-placement="top"
                                        title="Lihat Pelamar"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('perusahaan.editLowongan', $d->id_lowongan) }}"
                                        class="btn btn-secondary m-1" data-toggle="tooltip" data-placement="top"
                                        title="Edit lowongan"><i class="fa fa-pencil-alt"></i></a>
                                    @if ($d->status == 1)
                                        <a href="{{ route('perusahaan.tutupLowongan', $d->id_lowongan) }}"
                                            class="btn btn-warning text-white m-1" data-toggle="tooltip"
                                            data-placement="top" title="Non Aktifkan Lowongan"><i
                                                class="fa fa-window-close"></i></a>
                                    @else
                                        <a href="{{ route('perusahaan.aktifkanLowongan', $d->id_lowongan) }}"
                                            class="btn btn-success m-1" data-toggle="tooltip" data-placement="top"
                                            title="Aktifkan Lowongan"><i class="fa fa-check"></i></a>
                                    @endif
                                    <a href="{{ route('perusahaan.hapusLowongan', $d->id_lowongan) }}"
                                        class="btn btn-danger m-1" data-toggle="tooltip" data-placement="top"
                                        title="Hapus lowongan"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahLowongan" tabindex="-1" role="dialog" aria-labelledby="tambahLowonganLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLowonganLabel">Tambah Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('perusahaan.tambahLowonganAction') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Perusahaan</label>
                            <input type="text" name="perusahaan" class="form-control" value="{{ $perusahaan->nama }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input type="text" name="judul" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Gaji</label>
                            <input type="text" name="gaji" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi</label>
                            <textarea name="lokasi" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Penempatan</label>
                            <input type="text" class="form-control" name="penempatan">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Penutupan</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Status Lowongan</label>
                            <select name="status" class="form-control">
                                <option value="">Pilih Status Lowongan</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan Terkait</label>
                            <select class="form-control" style="width: 100%" id="jurusan" name="jurusan[]" multiple>
                                @foreach (\App\Models\JurusanModel::all() as $jurusan)
                                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function() {
            $('#data-lowongan').DataTable();
            $('#jurusan').select2();
        });
    </script>
@endsection
