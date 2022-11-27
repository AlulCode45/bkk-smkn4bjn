@extends('Template.app')
@section('title', 'Daftar Lowongan')
@section('name-page', 'Daftar Lowongan')

@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6">
                    <h3>Kelola Lowongan Pekerjaan</h3>
                </div>
                <div class="col-6 d-flex">
                    <div class="ml-auto">
                        <button class="btn btn-success rounded rounded-pill" data-toggle="modal"
                            data-target="#tambahLowongan">Tambah</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="lowongan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Judul</th>
                            <th>Gaji</th>
                            <th>Lokasi</th>
                            <th>Penempatan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lowongan_data as $lowongan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lowongan->nama }}</td>
                                <td>{{ $lowongan->judul }}</td>
                                <td>{{ $lowongan->gaji }}</td>
                                <td>{{ $lowongan->lokasi }}</td>
                                <td>{{ $lowongan->penempatan }}</td>
                                <td>{{ $lowongan->tanggal }}</td>
                                <td>{!! $lowongan->status
                                    ? '<span class="badge badge-success">Aktif</span>'
                                    : '<span class="badge badge-danger">Tutup</span>' !!}
                                </td>
                                <td>
                                    <a href="{{ route('master.viewLowongan', $lowongan->id) }}"
                                        class="btn btn-success m-1"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('master.editLowongan', $lowongan->id) }}"
                                        class="btn btn-primary m-1"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="{{ route('master.hapusLowongan', $lowongan->id) }}"
                                        class="btn btn-danger m-1"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
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
                <form action="{{ route('master.tambahLowonganAction') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Perusahaan</label>
                            <select class="form-control" style="width: 100%" id="perusahaan" name="perusahaan">
                                @foreach ($data_perusahaan as $perusahaan)
                                    <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama }}</option>
                                @endforeach
                            </select>
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
            $('#lowongan').DataTable();
            $('#jurusan').select2({
                width: 'resolve',
                placeholder: 'Pilih Jurusan'
            });
            $('#perusahaan').select2({
                width: 'resolve',
                placeholder: 'Pilih Perusahaan'
            });
        });
    </script>
@endsection
