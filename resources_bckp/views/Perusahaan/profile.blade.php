@extends('Template.app')
@section('title', 'Profile Perusahaan')
@section('name-page', 'Profile Perusahaan')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="{{ route('perusahaan.updateProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <img src="{{ asset('assets/images/profile/' . Auth::user()->foto_profile) }}"
                    class="rounded rounded-circle mb-3" width="200" height="200" id="profile-photo">
                <div class="form-group">
                    <label for="">Foto Profile</label>
                    <input type="file" name="foto" class="form-control"onchange="previewImg(event)">
                </div>
                <div class="form-group">
                    <label for="">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control" value="{{ $perusahaan->nama }}">
                </div>
                <div class="form-group">
                    <label for="">Kode Perusahaan</label>
                    <input type="text" name="kode" class="form-control" value="{{ $perusahaan->kode }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $perusahaan->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Kota</label>
                    <input type="text" name="kota" class="form-control" value="{{ $perusahaan->kota }}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" value="{{ $perusahaan->no_telp }}">
                </div>
                <div class="form-group">
                    <label for="">Standar</label>
                    <input type="text" name="standar" class="form-control" value="{{ $perusahaan->standar }}">
                </div>
                <div class="form-group">
                    <label for="">Tahun Gabung</label>
                    <input type="number" name="tahun_gabung" class="form-control" value="{{ $perusahaan->tahun_gabung }}">
                </div>
                <div class="form-group">
                    <label for="">Status MOU</label>
                    <select name="status_mou" id="" class="form-control">
                        <option value="1" {{ $perusahaan->mou == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $perusahaan->mou == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">MOU FIlE (.pdf)</label>
                    <input type="file" name="mou_file" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">UMKM</label>
                    <select name="umkm" id="" class="form-control">
                        <option value="1" {{ $perusahaan->umkm == 1 ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ $perusahaan->umkm == 0 ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('perusahaan') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        function previewImg(e) {
            if (e.target.files.length > 0) {
                var src = URL.createObjectURL(e.target.files[0]);
                var preview = document.getElementById("profile-photo");
                preview.src = src;
            }
        }
    </script>
@endsection
