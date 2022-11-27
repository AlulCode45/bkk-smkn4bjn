@extends('Template.app')
@section('title', 'Edit perusahaan')
@section('name-page', 'Edit perusahaan')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="{{ route('operator.updatePerusahaan', $perusahaan->id) }}" method="post">
                @csrf
                <input type="hidden" name="idPerusahaan" value="{{ $perusahaan->id }}">
                <div class="form-group">
                    <label for="">Nama Perusahaan : </label>
                    <input type="text" name="nama" value="{{ $perusahaan->nama }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kode : </label>
                    <input type="text" name="kode" value="{{ $perusahaan->kode }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat : </label>
                    <textarea name="alamat" cols="20" class="form-control">{{ $perusahaan->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Kota : </label>
                    <input type="text" name="kota"value="{{ $perusahaan->kota }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email : </label>
                    <input type="email" name="email"value="{{ $perusahaan->email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No Telp : </label>
                    <input type="text" name="no_telp"value="{{ $perusahaan->no_telp }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tahun Gabung : </label>
                    <input type="number" name="tahun_gabung"value="{{ $perusahaan->tahun_gabung }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Standar : </label>
                    <input type="text" name="standar"value="{{ $perusahaan->standar }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mou : </label>
                    <select name="status_mou" class="form-control">
                        <option value="{{ $perusahaan->mou }}">{{ $perusahaan->mou ? 'Sudah MOU' : 'Belum MOU' }}</option>
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
                        <option value="{{ $perusahaan->umkm }}">{{ $perusahaan->umkm ? 'UMKM' : 'Tidak UMKM' }}
                        </option>
                        <option value="1">UMKM</option>
                        <option value="0">Tidak UMKM</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('operator.perusahaan') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
