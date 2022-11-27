@extends('Template.app')
@section('title', 'Daftar Perusahaan')
@section('name-page', 'Daftar Perusahaan')

@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6">
                    <h3>Kelola Perusahaan</h3>
                </div>
                <div class="col-6 d-flex">
                    <div class="ml-auto">
                        <button class="btn btn-success" data-toggle="modal" data-target="#tambahPerusahaan">Tambah</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="data-perusahaan" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Kode</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Tahun Gabung</th>
                            <th>Standar</th>
                            <th>MOU</th>
                            <th>UMKM</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_perusahaan as $perusahaan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $perusahaan->nama }}</td>
                                <td>{{ $perusahaan->kode }}</td>
                                <td>{{ $perusahaan->alamat }}</td>
                                <td>{{ $perusahaan->kota }}</td>
                                <td>{{ $perusahaan->email }}</td>
                                <td>{{ $perusahaan->no_telp }}</td>
                                <td>{{ $perusahaan->tahun_gabung }}</td>
                                <td>{{ $perusahaan->standar }}</td>
                                <td>
                                    {!! $perusahaan->mou ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}
                                </td>
                                <td>
                                    {!! $perusahaan->umkm ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}
                                </td>
                                <td>
                                    <a href="{{ route('operator.editPerusahaan', $perusahaan->id) }}"
                                        class="btn btn-success m-1"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="{{ route('operator.hapusPerusahaan', $perusahaan->id) }}"
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
    <div class="modal fade" id="tambahPerusahaan" tabindex="-1" role="dialog" aria-labelledby="tambahPerusahaanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPerusahaanLabel">Tambah Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('operator.tambahPerusahaanAction') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Perusahaan : </label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kode : </label>
                            <input type="text" name="kode" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat : </label>
                            <textarea name="alamat" cols="20"class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Kota : </label>
                            <input type="text" name="kota" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email : </label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password : </label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">No Telp : </label>
                            <input type="text" name="no_telp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Gabung : </label>
                            <input type="number" name="tahun_gabung" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Standar : </label>
                            <input type="text" name="standar" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Mou : </label>
                            <select name="status_mou" class="form-control">
                                <option value="">-- Status MOU --</option>
                                <option value="1">Sudah MOU</option>
                                <option value="0">Belum MOU</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Upload MOU</label>
                            <input type="file" name="mou_file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">UMKM : </label>
                            <select name="status_umkm" class="form-control">
                                <option value="">-- Status UMKM --</option>
                                <option value="1">UMKM</option>
                                <option value="0">Tidak UMKM</option>
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
            $('#data-perusahaan').DataTable();
        });
    </script>
@endsection
