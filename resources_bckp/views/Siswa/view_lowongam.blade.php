@extends('Template.app')
@section('title', $lowongan->judul)
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <h2>{{ $lowongan->judul }} - <a href="{{ '' }}">{{ $lowongan->nama }}</a></h2>
            <hr>
            <p>
            <h4 class="font-weight-bold">Deskripsi Perusahaan </h4><br>
            <b>Nama Perusahaan</b> : {{ $lowongan->nama }} <br>
            <b>Alamat Perusahaan</b> : {{ $lowongan->alamat }} <br>
            <b>Email Perusahaan</b> : {{ $lowongan->email }} <br>
            <b>No. Telepon Perusahaan</b> : {{ $lowongan->no_telp }} <br>
            <b>Standar</b> : {{ $lowongan->standar }} <br>
            <b>Status MOU</b> :
            @if ($lowongan->mou)
                <p class="badge badge-success p-1">Terdaftar</p>
            @else
                <p class="badge badge-danger p-1">Belum Terdaftar</p>
            @endif
            <br>
            <b>Tahun Gabung Perusahaam</b> : {{ $lowongan->tahun_gabung }} <br>


            <hr>
            <h4 class="font-weight-bold">Deskripsi Lowongan </h4><br>
            <b>Deskripsi Lowongan</b> : {!! $lowongan->deskripsi !!} <br>
            <b>Gaji</b> : {{ $lowongan->gaji }} <br>
            <b>Lokasi</b> : {{ $lowongan->lokasi }} <br>
            <b>Penempatan</b> : {{ $lowongan->penempatan }} <br>
            <b>Tanggal Berakhir</b> : {{ $lowongan->tanggal }} <br>
            <b>Jurusan Terkait</b> :
            @foreach (\App\Models\JurusanLowonganModel::where('id_lowongan', $lowongan->id)->get() as $jurusan)
                <p class="badge badge-primary p-2">{{ \App\Models\JurusanModel::find($jurusan->id_jurusan)->nama_jurusan }}
                </p>
            @endforeach
            </p>
            @php
                $status = \App\Models\PelamarModel::where([
                    'id_lowongan' => $lowongan->id,
                    'id_user' => Auth::user()->id,
                ])->first();
            @endphp
            @if ($status == null or $status->status == 0)
                <button class="btn btn-success" data-toggle="modal" data-target="#lamarKerja">
                    Lamar Kerja
                </button>
            @elseif ($status->status >= 1)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoLamaran">
                    Lihat Informasi Lamaran Anda
                </button>
            @endif
            <a href="{{ route('siswa.lowonganKerja') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    @if ($status == null or $status->status == 0)
        <div class="modal fade" id="lamarKerja" tabindex="-1" role="dialog" aria-labelledby="lamarKerjaLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lamarKerjaLabel">Silahkan isi data di bawah ini untuk melamar pekerjaan
                            !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('siswa.daftarLowongan') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_lowongan" value="{{ $lowongan->id }}">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="">Upload CV / Portofolio (.pdf)</label>
                                <input type="file" name="cv" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Lamar Kerja</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="infoLamaran" tabindex="-1" role="dialog" aria-labelledby="infoLamaranLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoLamaranLabel">Informasi Lamaran Anda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($status->status == 1)
                            <div class="d-flex w-100">
                                <i class="mx-auto fa fa-clock icon-status-lamaran mb-3 text-warning"></i>
                            </div>
                            <h2 class="text-center font-weight-bolder">Lamaran Anda Sedang Dalam Proses</h2>
                            <p class="text-center">Silahkan menunggu informasi selanjutnya dari perusahaan</p>
                        @elseif ($status->status == 2)
                            <div class="d-flex w-100">
                                <i class="mx-auto fa fa-check-circle icon-status-lamaran mb-3 text-success"></i>
                            </div>
                            <h2 class="text-center font-weight-bolder">Lamaran Anda Diterima</h2>
                            <p class="text-center">
                                Silahkan hubungi perusahaan untuk melakukan tahap selanjutnya
                            </p>
                        @elseif ($status->status == 3)
                            <div class="d-flex w-100">
                                <i class="mx-auto fa fa-times-circle icon-status-lamaran mb-3 text-danger"></i>
                            </div>
                            <h2 class="text-center font-weight-bolder">Lamaran Anda Ditolak</h2>
                            <p class="text-center">
                                Silahkan mencoba untuk melamar di perusahaan lain
                            </p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
