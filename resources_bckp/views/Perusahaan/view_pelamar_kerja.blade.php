@extends('Template.app')
@section('title', 'Pelamar Kerja')
@section('name-page', 'Pelamar Kerja')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <h2>{{ $pelamar->nama_siswa }} - <a href="{{ '' }}">{{ $pelamar->judul }}</a></h2>
            <hr>
            <p>
            <h4 class="font-weight-bold">Profile Siswa </h4><br>
            <b>Nama Siswa</b> : {{ $pelamar->nama_siswa }} <br>
            <b>Jenis Kelamin</b> : {{ $pelamar->kelamin }} <br>
            <b>Tanggal Lahir Siswa</b> : {{ $pelamar->tanggal_lahir }} <br>
            <b>NISN</b> : {{ $pelamar->nisn }} <br>
            <b>No Induk</b> : {{ $pelamar->no_induk }} <br>
            <b>Alumni Kelas</b> : {{ \App\Models\KomliModel::find($pelamar->id_komli)->nama_komli }} <br>
            <b>No. Telepon Siswa</b> : {{ $pelamar->no_telp }} <br>
            <b>Email Siswa</b> : {{ $pelamar->email }} <br>
            <b>Alumni Tahun</b> : {{ $pelamar->tahun_masuk + 3 }} <br>
            <b>Alamat Siswa</b> : {{ $pelamar->alamat }} <br>
            <b>Status Lamaran</b> :
            @if ($pelamar->status == 1)
                <span class="badge badge-warning text-white">Menunggu</span>
            @elseif($pelamar->status == 2)
                <span class="badge badge-success">Diterima</span>
            @else
                <span class="badge badge-danger">Ditolak</span>
            @endif
            <hr>
            <h4 class="font-weight-bold">CV pelamar </h4><br>
            <b>CV</b> : <a href="{{ asset('assets/files/cv/' . $pelamar->file_cv) }}" target="_blank">Lihat CV</a> <br>
            </p>

            @if ($pelamar->status == 1)
                <a href="{{ route('perusahaan.terimaPelamarKerja', [
                    'id_lowongan' => $id_lowongan,
                    'id_user' => $pelamar->id_user,
                ]) }}"
                    class="btn btn-success">Terima</a>
                <a href="{{ route('perusahaan.tolakPelamarKerja', [
                    'id_lowongan' => $id_lowongan,
                    'id_user' => $pelamar->id_user,
                ]) }}"
                    class="btn btn-danger">Tolak</a>
            @elseif($pelamar->status == 2)
                <a href="{{ route('perusahaan.batalTerimaPelamarKerja', [
                    'id_lowongan' => $id_lowongan,
                    'id_user' => $pelamar->id_user,
                ]) }}"
                    class="btn btn-danger">Batalkan Penerimaan</a>
            @else
                <a href="{{ route('perusahaan.batalTolakPelamarKerja', [
                    'id_lowongan' => $id_lowongan,
                    'id_user' => $pelamar->id_user,
                ]) }}"
                    class="btn btn-success">Batalkan Penolakan</a>
            @endif
            <a href="{{ route('perusahaan.pelamarKerja', $id_lowongan) }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
