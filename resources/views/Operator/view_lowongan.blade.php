@extends('Template.app')
@section('title', 'Lihat Lowongan')
@section('name-page', 'Lihat Lowongan')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <h3 class="font-weight-medium">{{ $lowongan->judul }}</h3>
            <hr>
            <p>
                Nama Perusahaan : {{ \App\Models\PerusahaanModel::find($lowongan->id_perusahaan)->nama }} <br>
                Judul Lowongan : {{ $lowongan->judul }} <br>
                Gaji : {{ $lowongan->gaji }} <br>
                Lokasi : {{ $lowongan->lokasi }} <br>
                Penempatan : {{ $lowongan->penempatan }} <br>
                Deskripsi : {!! $lowongan->deskripsi !!} <br>
                Jurusan Terkait :
                @foreach (\App\Models\JurusanLowonganModel::where('id_lowongan', $lowongan->id)->get() as $jurusan)
                    <div class="badge badge-success p-2">
                        {{ \App\Models\JurusanModel::find($jurusan->id_jurusan)->nama_jurusan }}
                    </div>
                @endforeach
            </p>

            <a href="{{ route('operator.lowongan') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
